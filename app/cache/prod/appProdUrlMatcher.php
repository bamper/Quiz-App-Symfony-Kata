<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // beforepage
        if ($pathinfo === '/before') {
            return array (  '_controller' => 'AppBundle\\Controller\\BeforeController::indexAction',  '_route' => 'beforepage',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\BeginController::indexAction',  '_route' => 'homepage',);
        }

        // quizpage
        if ($pathinfo === '/quiz') {
            return array (  '_controller' => 'AppBundle\\Controller\\QuizController::indexAction',  '_route' => 'quizpage',);
        }

        // thxpage
        if ($pathinfo === '/thx') {
            return array (  '_controller' => 'AppBundle\\Controller\\ThxController::indexAction',  '_route' => 'thxpage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
