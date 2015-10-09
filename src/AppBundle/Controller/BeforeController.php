<?php

namespace AppBundle\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\UsersToQuizset;
use AppBundle\Entity\QuestionToUserSet;

class BeforeController extends Controller
{
    private $em;
    private $quizSet;
    private $userId;
    private $usersQuizset;

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
        }else{
            return  $this->showTimerScreen($this->quizSet);
        }
    }

    private function getNearestSet(){
        return $this->em->getRepository('AppBundle:Quizset')->getNearest();
    }

    private function prepareUserAndQuizData(){
        $User = $this->em->getRepository('AppBundle:Users')->findOneById($this->userId);

        //this has to be saved but this is in set
        //$UsersToQuizset = UsersToQuizset::createUserSet($User, $this->quizSet);
        //$this->saveToDoctrine($UsersToQuizset);

        $Questions = $this->em->getRepository('AppBundle:Question')->findByIdSet($this->quizSet->getId());

        if( empty($Questions) ){
            return false;
        }

        $questionCount = count($Questions);

        $userHasQuestionsGenerated = $this->em->getRepository('AppBundle:QuestionToUserSet')
                                                    ->checkUserQuestionsCountEquals($questionCount, $this->userId, $this->quizSet->getId());

        if( !$userHasQuestionsGenerated )
        {
            $QuestionsToUserSet = QuestionToUserSet::createUserQuestions($User, $Questions, $this->usersQuizset);
            $this->saveToDoctrine($QuestionsToUserSet);
        }
    }

    private function saveToDoctrine($object){
        if( is_array($object)){
            foreach($object as $o ) {
                $this->em->persist($o);
                $this->em->flush();
            }
        } else{
            $this->em->persist($object);
            $this->em->flush();
        }


    }

    private function isUserAllowed(){
        $this->userId = $this->getUser()->getId();

        if( $this->quizSet instanceof Quizset){
            $this->usersQuizset = $this->em->getRepository('AppBundle:UsersToQuizset')->findOneBy(
                array(
                    'idUser' => $this->userId,
                    'idSet' => $this->quizSet->getId()
                )
            );
            if(is_null($this->usersQuizset)) return false;
            return $this->usersQuizset->isUserAllowed();

        }else return false;

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
