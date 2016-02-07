<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:50
 */

namespace KataBundle\Controller;

use KataBundle\Entity\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class CartController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $cartForm = $this->createForm('cart', new Cart());

        $cartForm->handleRequest($request);
        if ($cartForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($cartForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:default.html.twig', [
            'form' => $cartForm->createView()
        ]);
    }

}