<?php

namespace AppBundle\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\UsersToQuizset;
use AppBundle\Entity\QuestionToUserSet;

use QuizBundle\Utils\Quiz;
use QuizBundle\Utils\Data\QuizData;

class BeforeController extends Controller
{
    private $em;
    private $Quiz;

    /**
     * @Route("/before", name="beforepage")
     */
    public function indexAction(Request $request)
    {
        $this->em = $this->getDoctrine()->getManager();

        $this->Quiz = new Quiz($this->getUser()->getId(), new QuizData($this->em));

        return $this->decideWhatToShow();
    }

    private function decideWhatToShow(){

        $path = ucfirst($this->Quiz->decideWhatToDo());

        $functionName = "show" . $path . "Screen";
        return  $this->$functionName();

    }

    private function prepTimerData(){
        $return = array(
            'isSetPrepared' => false,
            'next_start_date' => null
        );

        $quizSet = $this->Quiz->getQuizSet();

        if( $quizSet instanceof Quizset){
            $return['isSetPrepared'] = true;
            $return['next_start_date'] = $quizSet->getDateStart();

        };
        return $return;
    }

    private function showWarningScreen(){
        return $this->render('AppBundle:before:warning.html.twig', array());
    }

    private function showStartScreen(){
        $is_ok = $this->Quiz->prepareUserAndQuizData();
        if( $is_ok )
        {
            return $this->render('AppBundle:before:index.html.twig', array());
        }else return $this->showWarningScreen();
    }

    private function showTimerScreen(){
        return $this->render('AppBundle:before:timer.html.twig', $this->prepTimerData());
    }
}
