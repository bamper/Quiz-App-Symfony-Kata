<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:50
 */

namespace KataBundle\Controller;

use KataBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $categoryForm = $this->createForm('category', new Category());

        $categoryForm->handleRequest($request);
        if ($categoryForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($categoryForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:default.html.twig', [
            'form' => $categoryForm->createView()
        ]);
    }

}