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
        $quizset = $em->getRepository('AppBundle:Quizset')->getNearest();

        foreach($users as $user){
            $plainPassword = $this->random_str(8);

            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user->setPass($encoded);

            $UsersToQuizset = UsersToQuizset::createUserSet($user, $quizset);



            $status = $this->sendEmail($user->getEmail(), $plainPassword);

            $UsersToQuizset->setIsEmailSent(boolval($status));

            $em->persist($UsersToQuizset);
            $em->flush();
        }




        return $this->render('AppBundle:begin:index.html.twig', array(
            'error' => ""
        ));
    }


    /**
     * @Route("/sendsingle", name="sendsingle")
     */
    public function sendsingleAction(Request $request){
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:Users')->findOneById(20);
        $quizset = $em->getRepository('AppBundle:Quizset')->getNearest();


        $plainPassword = $this->random_str(8);

        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($user, $plainPassword);

        $user->setPass($encoded);

        $UsersToQuizset = UsersToQuizset::createUserSet($user, $quizset);



        $status = $this->sendEmail($user->getEmail(), $plainPassword);

        var_dump($status);

        $UsersToQuizset->setIsEmailSent($status);

        $em->persist($UsersToQuizset);
        $em->flush();





        return $this->render('AppBundle:begin:index.html.twig', array(
            'error' => ""
        ));
    }

    private function sendEmail($email, $password){
        $message = \Swift_Message::newInstance()
            ->setSubject('Test od Diageo')
            ->setFrom(array('info@diageoprofessionalteam.pl' => "Diageo"))
            ->setTo($email)
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'AppBundle:emails:info.html.twig',
                    array(
                        'adress' => "http://diageoprofessionalteam.pl",
                        'password' => $password)
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
