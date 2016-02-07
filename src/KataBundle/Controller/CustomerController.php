<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:50
 */

namespace KataBundle\Controller;

use KataBundle\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class CustomerController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $customerForm = $this->createForm('customer', new Customer());

        $customerForm->handleRequest($request);
        if ($customerForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($customerForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:default.html.twig', [
            'form' => $customerForm->createView()
        ]);
    }

}