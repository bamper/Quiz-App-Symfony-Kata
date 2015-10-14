<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:04 PM
 */

namespace QuizBundle\Utils\Anwsers;

use QuizBundle\Utils\Anwsers\User\QuizUser;
use QuizBundle\Utils\Data\QuizData;

class QuizCollection {

    private $usersAnwsers;
    private $quizData;

    public function __construct(QuizData $qd){
        $this->quizData = $qd;
        $this->usersAnwsers = array();
    }

    public static function create(QuizData $qd, $userData)
    {
        $userCollection = new QuizCollection($qd);

        foreach($userData as $ud)
        {
            $userCollection->add(QuizUser::create($ud));
        }

        return $userCollection;
    }

    public function add(QuizUser $qu)
    {
        $qu->setAnwsers($this->quizData);
        $this->usersAnwsers[] = $qu;
    }

    public function getOutcome()
    {
        $out = array();
        foreach($this->usersAnwsers as $us)
        {
            $out[] = $us->getOutcome();
        }
        return $out;
    }
} 