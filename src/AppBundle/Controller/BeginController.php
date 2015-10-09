<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\UsersToQuizset;
use AppBundle\Entity\QuestionToUserSet;
use AppBundle\Form\LoginForm;

class BeginController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();


        // replace this example code with whatever you need
        return $this->render('AppBundle:begin:index.html.twig', array(
            'error' => $error
        ));
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(){


    }

    /**
     * @Route("/sendemail", name="sendemail")
     */
    public function sendemailAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:Users')->findAll();
        //$user = $em->getRepository('AppBundle:Users')->findOneById(21);
        $quizset = $em->getRepository('AppBundle:Quizset')->getNearest();

        /*
        $usersToSend = array();
        foreach($users as $user)
        {
            $took = $em->getRepository('AppBundle:UsersToQuizset')->userTookQuiz($user->getId(),$quizset->getId() );

            if( !$took ){
                $usersToSend[] =  $user;
            }


        }
        */

        foreach($users as $user){
            $plainPassword = $this->random_str(8);

            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user->setPass($encoded);

            $UsersToQuizset = UsersToQuizset::createUserSet($user, $quizset);



            $status = $this->sendEmail($user->getEmail(), $plainPassword, $quizset);

            $UsersToQuizset->setIsEmailSent(($status));

            $em->persist($UsersToQuizset);
            $em->flush();
        }

        return $this->render('AppBundle:begin:index.html.twig', array(
            'error' => ""
        ));
    }

    /**
     * @Route("/getwinners", name="getwinners")
     */
    public function getwinnersAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $questionRepo = $em->getRepository('AppBundle:QuestionToUserSet');

        $users = $em->getRepository('AppBundle:UsersToQuizset')->getUsersWhoFinished(7);


        $parsedData = array();
        foreach($users as $user)
        {
            $parsedData[$user['id']] =  array('user' => $user, 'answer' =>array());


            $seconds = $user['dateEnd'] - $user['dateStart'];
            $parsedData[$user['id']]['user']['time'] = array('min' => floor($seconds / 60),'sec' => ($seconds % 60) ) ;
            $answers = $questionRepo->getUserAnswers($user['id'], $user['idSet']);

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
    }


    /**
     * @Route("/sendsingle", name="sendsingle")
     */
    public function sendsingleAction(Request $request){
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:Users')->findOneById(61);
        $quizset = $em->getRepository('AppBundle:Quizset')->getNearest();


        $plainPassword = $this->random_str(8);
        var_dump($plainPassword);
        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($user, $plainPassword);

        $user->setPass($encoded);

        $UsersToQuizset = UsersToQuizset::createUserSet($user, $quizset);



        $status = $this->sendEmail($user->getEmail(), $plainPassword, $quizset);

        var_dump($status);

        $UsersToQuizset->setIsEmailSent($status);

        $em->persist($UsersToQuizset);
        $em->flush();





        return $this->render('AppBundle:begin:index.html.twig', array(
            'error' => ""
        ));
    }

    private function sendEmail($email, $password, $quizset){
        $message = \Swift_Message::newInstance()
            ->setSubject('Diageo - wypełnij test!')
            ->setFrom(array('info@diageoprofessionalteam.pl' => "Diageo"))
            ->setTo($email)
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'AppBundle:emails:info.html.twig',
                    array(
                        'adress' => "http://diageoprofessionalteam.pl",
                        'password' => $password,
                        'start_date' => $quizset->getDateStart(),
                        'end_date' => $quizset->getDateEnd())
                ),
                'text/html'
            )
            /*
            ->addPart(
                $this->renderView(
                    'AppBundle:emails:info.text.twig',
                    array(
                        'adress' => "http://diageoprofessionalteam.pl",
                        'password' => $password)
                ),
                'text/plain'
            )*/

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
