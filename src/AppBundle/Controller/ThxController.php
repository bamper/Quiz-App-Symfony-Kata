<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quizset;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ThxController extends Controller
{
    private $em;
    private $quizSet;
    private $user;
    private $userId;
    private $questions;

    /**
     * @Route("/thx", name="thxpage")
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


        $this->saveTime();
        $this->getQuestionsForUser();

        $okey = $this->saveQuiz($request);

        if( !$okey ){
            return $this->redirectToRoute('quizpage');
        }

        // replace this example code with whatever you need
        return $this->render('AppBundle:thx:index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    private function saveQuiz($request){

        $userAns = $request->get('quiz');

        if( count($this->questions) != count($userAns) ){
            return false;
        }


        foreach($this->questions as $q){
            $ans = filter_var($userAns[$q['hashQuestion']], FILTER_SANITIZE_STRING);


            $result = $this->em->getRepository('AppBundle:QuestionToUserSet')->saveAns($ans, $q['hashQuestion'], $this->user->getId(), $this->quizSet->getId() );
            if ( !$result ) return false;
        }

        return true;
    }

    private function saveTime(){
        $this->em->getRepository('AppBundle:UsersToQuizset')->saveEndDate($this->user->getId());
    }

    private function getUserLoged(){
        $this->user = $this->em->getRepository('AppBundle:Users')->findOneById($this->getUser()->getId());
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
