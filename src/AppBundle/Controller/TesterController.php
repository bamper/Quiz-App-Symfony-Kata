<?php

namespace AppBundle\Controller;

use AppBundle\Entity\UserForm;
use AppBundle\Entity\UserProd;
use AppBundle\Form\UserFormType;
use AppBundle\Form\UserProdType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class TesterController extends Controller
{
    /**
     *
     * @param Request $request
     * @Route("/testers", name="testers")
     * @Template("AppBundle:testers:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $formProducts = $this->getDoctrine()->getRepository('AppBundle:FormProd')->findBy(array('formVersion' => 'ver1'));


        var_dump($formProducts[0]->getProduct()->getName());

        //$form = $this->createForm(new UserProdType(), new UserProd());
        $form = $this->createForm(new UserFormType(), new UserForm());
        $form->handleRequest($request);
        if ($form->isValid()) {
            var_dump($form->getData());
        }


        return array(
            'form' => $form->createView()

        );
    }

}
