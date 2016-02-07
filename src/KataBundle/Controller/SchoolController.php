<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:51
 */

namespace KataBundle\Controller;

use KataBundle\Entity\School;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class SchoolController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $schoolForm = $this->createForm('school', new School());

        $schoolForm->handleRequest($this->get('request'));

        return $this->render('KataBundle:Forms:School/school.html.twig', [
            'form' => $schoolForm->createView()
        ]);
    }
}