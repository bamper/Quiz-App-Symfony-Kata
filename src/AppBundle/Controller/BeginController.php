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

}
