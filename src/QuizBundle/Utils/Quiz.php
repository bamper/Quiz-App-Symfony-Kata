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

class Quiz {

    private $QuizSet;
    private $User;
    private $UserQuizSet;
    private $userId;
    private $isUserAllowed;
    private $isSetActive;
    private $em;
    private $dataProvider;

    public function __construct($userId, QuizData $qd)
    {
        try
        {
            $this->userId = $userId;

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

    public function getUser()
    {
        $this->User = $this->dataProvider->getUser($this->userId);
    }

    public function getUserQuizSet()
    {
        if( $this->QuizSet instanceof Quizset){
            $this->UserQuizSet = $this->dataProvider->getUserQuizSet($this->userId, $this->QuizSet->getId());
        }else $this->UserQuizSet = false;
    }

    public function isQuizActive()
    {
        if( $this->QuizSet instanceof Quizset){
            return $this->QuizSet->isActiveNow();
        }else return false;
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