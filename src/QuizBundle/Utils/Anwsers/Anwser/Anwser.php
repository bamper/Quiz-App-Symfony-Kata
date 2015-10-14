<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:29 PM
 */

namespace QuizBundle\Utils\Anwsers\Anwser;


abstract class Anwser {

    /*
     *
     * us.hashQuestion, us.hashAns1, us.hashAns2, us.hashAns3, us.hashUserAns, us.id, us.idQuestion,
                            q.content, q.ans1, q.ans2, q.ans3, q.type, q.correct
     *
     */

    protected $status;
    protected $idQuestion;
    protected $userId;
    protected $anwsers;
    protected $anwserContent;
    protected $correct;
    protected $userAnwser;

    abstract protected function prepareCorrectAnwser($correct);
    abstract protected function prepareUserAnwser($anwser);
    abstract protected function checkAnwsers();

    public function prepareAnwsers($data)
    {
        $this->anwsers = array(
            $data['hashAns1'],
            $data['hashAns2'],
            $data['hashAns3']
        );

        $this->anwserContent = array(
            $data['ans1'],
            $data['ans2'],
            $data['ans3']
        );
    }

    public function isCorrect(){
        return $this->status;
    }
} 