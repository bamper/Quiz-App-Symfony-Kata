<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:50
 */

namespace KataBundle\Controller;

use KataBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class ProductController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $productForm = $this->createForm('product', new Product());

        $productForm->handleRequest($request);
        if ($productForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($productForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:default.html.twig', [
            'form' => $productForm->createView()
        ]);
    }

}