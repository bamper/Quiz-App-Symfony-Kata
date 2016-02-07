<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:48
 */

namespace KataBundle\Controller;

use KataBundle\Entity\Adress;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdressController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $adressForm = $this->createForm('adress', new Adress());


        $adressForm->handleRequest($this->get('request'));
        if ($adressForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($adressForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:Adress/adress.html.twig', [
            'form' => $adressForm->createView()
        ]);
    }

}