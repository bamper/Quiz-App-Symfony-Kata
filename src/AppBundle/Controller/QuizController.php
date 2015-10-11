<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quizset;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use QuizBundle\Utils\Quiz;
use QuizBundle\Utils\Data\QuizData;

class QuizController extends Controller
{
    private $em;
    private $Quiz;

    /**
     * @Route("/quiz", name="quizpage")
     */
    public function indexAction(Request $request)
    {
        $this->em = $this->getDoctrine()->getManager();

        $this->Quiz = new Quiz($this->getUser()->getId(), new QuizData($this->em));

        return $this->decideWhatToShow();
    }

    public function decideWhatToShow()
    {
        $state = $this->Quiz->decideWhatToDo();
        if( $state == "warning" || $state == "timer")
        {
            return $this->redirectToRoute('beforepage');
        }

        // replace this example code with whatever you need
        return $this->render('AppBundle:quiz:index.html.twig', array(
            'questions' => $this->getQuestionsForUser()
        ));
    }

    private function getQuestionsForUser(){
        $questions = $this->Quiz->getQuestionsForUser();
        $this->Quiz->makeImageQuestions();
        $this->Quiz->saveStartTime();
        return $questions;
    }

}
