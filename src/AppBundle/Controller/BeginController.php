<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Form\LoginForm;

class BeginController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new LoginForm(), null);


        $form->handleRequest($request);
        if( $form->isValid())
        {
            var_dump($form->get("email")->getViewData());
            var_dump($form->get("pass")->getViewData());
        }

        // replace this example code with whatever you need
        return $this->render('AppBundle:begin:index.html.twig', array(
            'form' => $form->createView(),
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }
}
