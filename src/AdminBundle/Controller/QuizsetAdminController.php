<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/11/15
 * Time: 2:37 PM
 */

namespace AdminBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\UsersToQuizset;
use AppBundle\Entity\QuestionToUserSet;
use AppBundle\Form\LoginForm;

class QuizsetAdminController extends Controller {


    public function sendemailAction()
    {
        $quizset = $this->admin->getSubject();

        if (!$quizset) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s'));
        }

        if (!$quizset->isActiveNow())
        {
            $this->addFlash('sonata_flash_error', 'Ten etap jest nie aktywny');
            return new RedirectResponse($this->admin->generateUrl('list'));
        }

        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Users')->findAll();

        foreach($users as $user){
            $plainPassword = $this->random_str(8);

            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user->setPass($encoded);

            $UsersToQuizset = $em->getRepository('AppBundle:UsersToQuizset')->findOneBy(
                array(
                    'idUser' => $user->getId(),
                    'idSet' => $quizset->getId()
                )

            );

            if(!$UsersToQuizset)
            {
                $UsersToQuizset = UsersToQuizset::createUserSet($user, $quizset);
            }

            $status = $this->sendEmail($user->getEmail(), $plainPassword, $quizset);

            $UsersToQuizset->setIsEmailSent(($status));

            $em->persist($UsersToQuizset);
            $em->flush();
        }

        $this->addFlash('sonata_flash_success', 'Wysłano wiadomości');

        return new RedirectResponse($this->admin->generateUrl('list'));
    }


    public function getwinnersAction()
    {
        $quizset = $this->admin->getSubject();

        if (!$quizset) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s'));
        }

        $em = $this->getDoctrine()->getManager();
        $questionRepo = $em->getRepository('AppBundle:QuestionToUserSet');

        $users = $em->getRepository('AppBundle:UsersToQuizset')->getUsersWhoFinished($quizset->getId());

        if(!$users && empty($users))
        {
            $this->addFlash('sonata_flash_error', 'Nie ma danych');
            return new RedirectResponse($this->admin->generateUrl('list'));
        }

        $parsedData = array();
        foreach($users as $user)
        {
            $parsedData[$user['id']] =  array('user' => $user, 'answer' =>array());


            $seconds = $user['dateEnd'] - $user['dateStart'];
            $parsedData[$user['id']]['user']['time'] = array('min' => floor($seconds / 60),'sec' => ($seconds % 60) ) ;
            $answers = $questionRepo->getUserAnswers($user['id'], $user['idSet']);

            if(!$answers && empty($answers))
            {
                $this->addFlash('sonata_flash_error', 'Nie ma odpowiedzi dla tego etapu');
                return new RedirectResponse($this->admin->generateUrl('list'));
            }

            $parsedData[$user['id']]['user']['correct'] = 0;
            foreach($answers as $answer)
            {

                $parsedData[$user['id']]['answer'][$answer['id']]['content'] = $answer['content'];

                $userAnswer = explode("|", $answer['hashUserAns']);
                $counted = false;

                for($i = 1; $i <= 3; $i++)
                {


                    if(in_array($answer['hashAns'.$i], $userAnswer))
                    {

                        $parsedData[$user['id']]['answer'][$answer['id']]['answer'] = $answer['ans'.$i];
                        $parsedData[$user['id']]['answer'][$answer['id']]['correct'] = $answer['ans' . $answer['correct']];

                        $isCorrect = 'NIE';
                        if( $i == $answer['correct']) {
                            $isCorrect = 'TAK';
                            if(!$counted) {
                                $parsedData[$user['id']]['user']['correct'] += 1;
                                $counted = true;
                            }
                        }
                        $parsedData[$user['id']]['answer'][$answer['id']]['iscorrect'] = $isCorrect;
                    }
                }

            }


        }

        return $this->render('AppBundle:begin:answer.html.twig', array(
            'answers' => $parsedData
        ));

       // return new RedirectResponse($this->admin->generateUrl('list'));
    }

    public function addquestionAction()
    {
        return new RedirectResponse($this->admin->generateUrl('list'));
    }

    private function sendEmail($email, $password, $quizset){
        $message = \Swift_Message::newInstance()
            ->setSubject('Diageo - wypełnij test!')
            ->setFrom(array('info@diageoprofessionalteam.pl' => "Diageo"))
            ->setTo($email)
            ->setBody(
                $this->renderView(

                    'AdminBundle:emails:info.html.twig',
                    array(
                        'adress' => "http://diageoprofessionalteam.pl",
                        'password' => $password,
                        'start_date' => $quizset->getDateStart(),
                        'end_date' => $quizset->getDateEnd())
                ),
                'text/html'
            )


        ;
        return $this->get('mailer')->send($message);

    }


    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[rand(0, $max)];
        }
        return $str;
    }

} 