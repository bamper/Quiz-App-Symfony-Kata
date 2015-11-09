<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/11/15
 * Time: 2:37 PM
 */

namespace AdminBundle\Controller;

use QuizBundle\Utils\Anwsers\QuizCollection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\UsersToQuizset;
use AppBundle\Entity\QuestionToUserSet;
use Exception;
use InvalidArgumentException;
use QuizBundle\Utils\Data\QuizData;
use QuizBundle\Utils\Quiz;


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

            $template = $em->getRepository('AppBundle:EmailTemplate')->findOneById(1);

            $status = $this->sendEmail($user->getEmail(), $plainPassword, $quizset, $template->getTemplate());


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

        try
        {
            $parsedData = Quiz::getQuizAnwsers(new QuizData($em), $quizset);

            return $this->render('AppBundle:begin:answer.html.twig', array(
                'answers' => $parsedData
            ));
        }
        catch(InvalidArgumentException $e)
        {
            $this->addFlash('sonata_flash_error', 'Nie ma danych');
            return new RedirectResponse($this->admin->generateUrl('list'));
        }
    }

    public function addquestionAction()
    {
        return new RedirectResponse($this->admin->generateUrl('list'));
    }

    private function sendEmail($email, $password, $quizset, $template){

        $day_start  = $quizset->getDateStart();
        $day_end    = $quizset->getDateEnd();

        $twig = clone $this->get('twig');
        $twig->setLoader(new \Twig_Loader_String());


        $renderedTemplate = $twig->render(
            $template,
            array(
                'adress' => "http://diageoprofessionalteam.pl",
                'haslo' => $password,
                'dzien_start' => $day_start->format('j'),
                'dzien_stop' =>  $day_end->format('j'),
                'godzina_start' => $day_start->format("H:i"),
                'godzina_stop' => $day_end->format("H:i")
            ));

        $message = \Swift_Message::newInstance()
            ->setSubject('Diageo - wypełnij test!')
            ->setFrom(array('info@diageoprofessionalteam.pl' => "Diageo"))
            ->setTo($email)
            ->setBody($renderedTemplate, 'text/html' );
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