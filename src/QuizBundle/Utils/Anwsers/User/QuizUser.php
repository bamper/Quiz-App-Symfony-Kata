<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:05 PM
 */

namespace QuizBundle\Utils\Anwsers\User;

use QuizBundle\Utils\Data\QuizData;
use QuizBundle\Utils\Anwsers\Anwser\AnwserCollection;

class QuizUser {

    private $id;
    private $email;
    private $idSet;
    private $time;
    private $parsedTime;
    private $anwserCollection;

    public function __construct($id, $email, $idSet)
    {
        $this->id = $id;
        $this->email = $email;
        $this->idSet = $idSet;
    }

    public static function create($userdata)
    {
        $quizUser = new QuizUSer($userdata['id'], $userdata['email'], $userdata['idSet']);
        $quizUser->setTime($userdata['dateStart'], $userdata['dateEnd']);
        return $quizUser;
    }

    public function setAnwsers(QuizData $qd)
    {
        $anwsers = $qd->getUserAnwsers($this->id, $this->idSet);
        $this->anwserCollection = new AnwserCollection($anwsers);
    }

    public function getOutcome(){

        return array(
            'email' => $this->email,
            'time'  => $this->parsedTime,
            'totalQuestions' => $this->anwserCollection->getSize(),
            'totalCorrect'   => $this->anwserCollection->countCorrect(),
            'openQuestions'  => $this->anwserCollection->getOpen()
        );
    }

    public function returnParsedTime()
    {
        return $this->parsedTime;
    }

    public function setTime($startTimestamp, $endTimestamp)
    {
        $this->time = $endTimestamp - $startTimestamp;
        $this->parsedTime = array(
           'minutes' =>   floor($this->time / 60),
           'seconds' =>   ($this->time % 60)
        );
    }
} 