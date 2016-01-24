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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adressAction(Request $request)
    {
        $adressForm = $this->createForm('adress', new Adress());


        $adressForm->handleRequest($request);
        if ($adressForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($adressForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:adress.html.twig', [
            'form' => $adressForm->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function userAction(Request $request)
    {
        $userForm = $this->createForm('user', new User());

        $userForm->handleRequest($request);

        return $this->render('KataBundle:Forms:user.html.twig', [
            'form' => $userForm->createView()
        ]);
    }
}

