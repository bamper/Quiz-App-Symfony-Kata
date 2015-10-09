<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/9/15
 * Time: 2:11 PM
 */

namespace QuizBundle\Utils\Data;


use Doctrine\ORM\EntityManager;

class QuizData {

    private $em;

    public function __construct(EntityManager $em)
    {
        if( !is_null($this->em) )
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
}