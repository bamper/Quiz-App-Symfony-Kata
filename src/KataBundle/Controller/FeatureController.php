<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 07.02.16
 * Time: 18:50
 */

namespace KataBundle\Controller;

use KataBundle\Entity\Feature;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class FeatureController extends Controller
{
    public function indexAction()
    {
        $request = $this->get('request');
        $featureForm = $this->createForm('feature', new Feature());

        $featureForm->handleRequest($request);
        if ($featureForm->isValid()) {
            $this->get('doctrine.orm.default_entity_manager')->persist($featureForm->getData());
            $this->get('doctrine.orm.default_entity_manager')->flush();
        }

        return $this->render('KataBundle:Forms:default.html.twig', [
            'form' => $featureForm->createView()
        ]);
    }

}