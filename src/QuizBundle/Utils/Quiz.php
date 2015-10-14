<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/9/15
 * Time: 2:11 PM
 */

namespace QuizBundle\Utils;

use QuizBundle\Utils\Data\QuizData;
use Doctrine\ORM\EntityManager;
use InvalidArgumentException;
use AppBundle\Entity\Quizset;
use Symfony\Component\HttpFoundation\Request;
use QuizBundle\Utils\Anwsers\QuizCollection;

class Quiz {

    private $QuizSet;
    private $User;
    private $UserQuizSet;
    private $userId;
    private $isUserAllowed;
    private $isSetActive;
    private $em;
    private $dataProvider;
    private $questions;

    public function __construct($userId, QuizData $qd)
    {
        try
        {
            $this->attachDataProvider($qd);
            $this->getNearestQuizSet();
            $this->getUser($userId);
            $this->getUserQuizSet();
        }
        catch (InvalidArgumentException $e)
        {
            $this->QuizSet = false;
            $this->User = false;
            $this->UserQuizSet = false;

        }


    }

    public function attachDataProvider(QuizData $qd)
    {
       $this->dataProvider = $qd;
    }

    public function getNearestQuizSet(){
        $this->QuizSet = $this->dataProvider->getNearestQuiz();
    }

    public function getQuizSet()
    {
        return $this->QuizSet;
    }

    public function getUser()
    {
        $this->User = $this->dataProvider->getUser($this->userId);
    }

    public function getUserQuizSet()
    {
        if( $this->QuizSet instanceof Quizset){
            $this->UserQuizSet = $this->dataProvider->getUserQuizSet($this->userId, $this->QuizSet->getId());
        }else $this->UserQuizSet = false;
        return $this->UserQuizSet;
    }

    public function prepareUserAndQuizData()
    {
        if( $this->User && $this->UserQuizSet )
        {
            $this->dataProvider->prepareQuestionsForUser($this->User, $this->UserQuizSet);
            return true;
        }else{
            return false;
        }
    }

    public function decideWhatToDo()
    {
        $this->isUserAllowed = $this->isUserAllowed();
        $this->isSetActive   = $this->isQuizActive();

        //if set is active and user can take part
        if( $this->isUserAllowed &&
            $this->isSetActive){

            return  "start";

            //if set is active but the user took part in it
        }else if(   !$this->isUserAllowed &&
                     $this->isSetActive){

            return  "warning";

            //if user took part in last one and next quiz is not ready
        }else{
            return  "timer";
        }
    }

    public function getQuestionsForUser()
    {
        $this->questions = $this->dataProvider->getQuestionsForUser($this->User, $this->QuizSet);
        return $this->questions;
    }

    public function makeImageQuestions()
    {

    }

    public function saveQuiz(Request $request)
    {
        $this->getQuestionsForUser();

        $userAns = $request->get('quiz');

        if( count($this->questions) != count($userAns) ){
            return false;
        }

        foreach($this->questions as $q){
            $ans = null;
            if($q['type'] == "radio") {
                $ans = filter_var($userAns[$q['hashQuestion']], FILTER_SANITIZE_STRING);
            }

            if($q['type'] == "checkbox") {
                $ans = array_map(function($var){return filter_var($var,FILTER_SANITIZE_STRING);}, $userAns[$q['hashQuestion']]);
                $ans = implode("|", $ans);
            }

            $result = $this->dataProvider->saveAns($ans, $q['hashQuestion'], $this->User->getId(), $this->QuizSet->getId() );

            if ( !$result ) return false;
        }

        return true;
    }

    public static function getQuizAnwsers(QuizData $qd, Quizset $quizset)
    {

        $users = $qd->getUsersWhoFinished($quizset->getId());

        if(!$users && empty($users))
        {
            throw new \InvalidArgumentException("There is no users");
        }
        $quizAnsCollection = QuizCollection::create($qd, $users);

        return $quizAnsCollection->getOutcome();
    }


    public function isQuizActive()
    {
        if( $this->QuizSet instanceof Quizset){
            return $this->QuizSet->isActiveNow();
        }else return false;
    }

    public function saveStartTime()
    {
        $this->dataProvider->saveStartTime($this->User->getId());
    }

    public function saveEndTime()
    {
        $this->dataProvider->saveEndTime($this->User->getId());
    }

    public function isUserAllowed()
    {
        if($this->UserQuizSet)
        {
            return $this->UserQuizSet->isUserAllowed();
        }
        return false;

    }
}