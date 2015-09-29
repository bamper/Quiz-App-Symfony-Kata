<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Quizset;

class BeforeController extends Controller
{
    private $em;
    private $quizSet;

    /**
     * @Route("/before", name="beforepage")
     */
    public function indexAction(Request $request)
    {
        $this->em = $this->getDoctrine()->getManager();

        $this->quizSet = $this->getNearestSet();

        return $this->decideWhatToShow();
    }

    private function decideWhatToShow(){
        $isUserAllowed = $this->isUserAllowed();
        $isSetActiveNow = $this->isSetActiveNow();

        //if set is active and user can take part
        if( $isUserAllowed &&
            $isSetActiveNow){

            return  $this->showStartButtonScreen();

            //if set is active but the user took part in it
        }else if(   !$isUserAllowed &&
                    $isSetActiveNow){

            return  $this->showWarningScreen();

            //if user took part in last one and next quiz is not ready
        }else if(   !$isUserAllowed &&
                    !$isSetActiveNow){
            return  $this->showTimerScreen($this->quizSet);
        }
    }

    private function getNearestSet(){
        return $this->em->getRepository('AppBundle:Quizset')->getNearest();
    }

    //TODO: make quiz preparations
    private function prepareUserAndQuizData(){

    }

    //TODO: make user check
    private function isUserAllowed(){
        return false;
    }

    private function isSetActiveNow(){
        if( $this->quizSet instanceof Quizset){
            return $this->quizSet->isActiveNow();
        }else return false;

    }

    private function prepTimerData(){
        $return = array(
            'isSetPrepared' => false,
            'next_start_date' => null
        );

        if( $this->quizSet instanceof Quizset){
            $return['isSetPrepared'] = true;
            $return['next_start_date'] = $this->quizSet->getDateStart();

        };
        return $return;
    }

    private function showWarningScreen(){
        return $this->render('AppBundle:before:warning.html.twig', array());
    }

    private function showStartButtonScreen(){
        $this->prepareUserAndQuizData();
        return $this->render('AppBundle:before:index.html.twig', array());
    }

    private function showTimerScreen(){
        return $this->render('AppBundle:before:timer.html.twig', $this->prepTimerData());
    }
}
