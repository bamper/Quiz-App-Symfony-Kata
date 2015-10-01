<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quizset;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class QuizController extends Controller
{
    private $em;
    private $quizSet;
    private $user;
    private $userId;
    private $questions;

    /**
     * @Route("/quiz", name="quizpage")
     */
    public function indexAction(Request $request)
    {
        $this->em = $this->getDoctrine()->getManager();

        $isSetActive = $this->getSet();
        if( !$isSetActive ){
            return $this->redirectToRoute('homepage');
        }

        $canTakeQuiz = $this->getUserLoged();
        if( !$canTakeQuiz ){
            return $this->redirectToRoute('beforepage');
        }


        $this->getQuestionsForUser();
        $this->makeImageQuestions();
        $this->saveTime();

        // replace this example code with whatever you need
        return $this->render('AppBundle:quiz:index.html.twig', array(
            'questions' => $this->questions
        ));
    }

    private function saveTime(){
        $this->em->getRepository('AppBundle:UsersToQuizset')->saveStartDate($this->user->getId());
    }

    private function makeImageQuestions(){

    }

    private function getUserLoged(){
        $this->user = $this->em->getRepository('AppBundle:Users')->findOneById(1);
        $this->userId = $this->getUser()->getId();


        $usersQuizset = $this->em->getRepository('AppBundle:UsersToQuizset')->findOneBy(
            array(
                'idUser' => $this->userId,
                'idSet' => $this->quizSet->getId()
            )
        );

        return $usersQuizset->isUserAllowed();


    }

    private function getQuestionsForUser(){
        $this->questions = $this->em->getRepository('AppBundle:QuestionToUserSet')->getUserQuestions($this->user, $this->quizSet);
    }

    private function getSet(){
        $this->quizSet = $this->em->getRepository('AppBundle:Quizset')->getNearest();
        if($this->quizSet instanceof Quizset ){
            if( $this->quizSet->isActiveNow() ){
                return true;
            }
        }
        return false;
    }
}
