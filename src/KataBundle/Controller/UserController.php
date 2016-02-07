<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:50
 */

namespace KataBundle\Controller;


use KataBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class UserController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $userForm = $this->createForm('user', new User());

        $userForm->handleRequest($request);

        return $this->render('KataBundle:Forms:User/user.html.twig', [
            'form' => $userForm->createView()
        ]);
    }

}