<?php

namespace KataBundle\Controller;

use KataBundle\Entity\Adress;
use KataBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('KataBundle:Default:index.html.twig', array('name' => "asd"));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function userAction(Request $request)
    {

    }
}

