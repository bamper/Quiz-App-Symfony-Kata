<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/9/15
 * Time: 2:11 PM
 */

namespace QuizBundle\Utils\Data;


use Doctrine\ORM\EntityManager;
use AppBundle\Entity\QuestionToUserSet;
use InvalidArgumentException;

class QuizData {

    private $em;

    public function __construct(EntityManager $em)
    {

        if( !is_null($em) )
        {
            $this->em = $em;
        }else throw new InvalidArgumentException('Entity Manager is NULL');

    }

    public function getNearestQuiz()
    {
        return $this->em->getRepository('AppBundle:Quizset')->getNearest();
    }

    public function getUser($userId)
    {
        return $this->em->getRepository('AppBundle:Users')->findOneById($userId);
    }

    public function getUserQuizSet($userId, $quizId)
    {
        return $this->em->getRepository('AppBundle:UsersToQuizset')->findOneBy(
            array(
                'idUser' => $userId,
                'idSet' => $quizId
            )

        );
    }

    public function getQuestionsForUser($User, $QuizSet)
    {
        return $this->em->getRepository('AppBundle:QuestionToUserSet')->getUserQuestions($User, $QuizSet);
    }

    public function prepareQuestionsForUser($User, $UserQuizSet )
    {
        $Questions = $this->getQuestionsForSet($UserQuizSet->getIdSet());

        if( empty($Questions) ){
            return false;
        }

        $questionCount = count($Questions);

        $userQuestionsGenerated = $this->checkUsersQuestions($questionCount, $User->getId(), $UserQuizSet->getIdSet());

        if( !$userQuestionsGenerated )
        {
            $QuestionsToUserSet = QuestionToUserSet::createUserQuestions($User, $Questions, $UserQuizSet);
            $this->saveToDoctrine($QuestionsToUserSet);
            return true;
        }

        $QuestionsToAdd = array();
        foreach($Questions as $question)
        {
            $idQuestion = $question->getId();

            $toAdd = true;
            foreach($userQuestionsGenerated as $userQuestion)
            {
                if($idQuestion == $userQuestion->getIdQuestion()){
                    $toAdd = false;
                    break;
                }
            }
            if($toAdd) $QuestionsToAdd[] = $question;
        }

        if( !empty($QuestionsToAdd) )
        {
            $QuestionsToUserSet = QuestionToUserSet::createUserQuestions($User, $QuestionsToAdd, $UserQuizSet);
            $this->saveToDoctrine($QuestionsToUserSet);
            return true;
        }
        return false;
    }

    public function checkUsersQuestions($questionCount, $userId, $idSet)
    {
        return $this->em->getRepository('AppBundle:QuestionToUserSet')
            ->checkUserQuestions($questionCount, $userId, $idSet);
    }

    public function getQuestionsForSet($idSet)
    {
        return $this->em->getRepository('AppBundle:Question')->findByIdSet($idSet);
    }

    public function getUserAnwsers($userId, $quizId)
    {
        return $this->em->getRepository('AppBundle:QuestionToUserSet')->getUserAnswers($userId, $quizId);
    }

    public function saveStartTime($userId)
    {
        $this->em->getRepository('AppBundle:UsersToQuizset')->saveStartDate($userId);
    }

    public function saveEndTime($userId)
    {
        $this->em->getRepository('AppBundle:UsersToQuizset')->saveEndDate($userId);
    }

    public function saveAns($ans, $hashQuestion, $userId, $quizId)
    {
        return $this->em->getRepository('AppBundle:QuestionToUserSet')->saveAns($ans, $hashQuestion, $userId, $quizId );
    }

    public function getUsersWhoFinished($quizId)
    {
        return $this->em->getRepository('AppBundle:UsersToQuizset')->getUsersWhoFinished($quizId);
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
}