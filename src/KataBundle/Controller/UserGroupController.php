<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:50
 */

namespace KataBundle\Controller;

use KataBundle\Entity\UserGroup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class UserGroupController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $userGroupForm = $this->createForm('usergroup', new UserGroup());

        $userGroupForm->handleRequest($request);
        if ($userGroupForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($userGroupForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:default.html.twig', [
            'form' => $userGroupForm->createView()
        ]);
    }

}