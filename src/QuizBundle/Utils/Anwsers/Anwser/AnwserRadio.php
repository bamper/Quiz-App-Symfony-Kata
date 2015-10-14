<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:30 PM
 */

namespace QuizBundle\Utils\Anwsers\Anwser;

use QuizBundle\Utils\Anwsers\Anwser\Anwser;

class AnwserRadio extends Anwser {


    /*
     *
     * us.hashQuestion, us.hashAns1, us.hashAns2, us.hashAns3, us.hashUserAns, us.id, us.idQuestion,
                            q.content, q.ans1, q.ans2, q.ans3, q.type, q.correct
     *
     */

    public function __construct($data)
    {
        $this->status = false;
        $this->idQuestion = $data['idQuestion'];
        $this->prepareCorrectAnwser($data['correct']);
        $this->prepareUserAnwser($data['hashUserAns']);
        $this->prepareAnwsers($data);
        $this->checkAnwsers();
    }

    protected function prepareCorrectAnwser($correct)
    {
        $this->correct = $correct;
    }

    protected function prepareUserAnwser($anwser)
    {
        $this->userAnwser = $anwser;
    }

    protected function checkAnwsers()
    {
        $ans = array_flip($this->anwsers);
        $anwserNumber = $ans[$this->userAnwser] + 1;

        if( $this->correct == $anwserNumber ){
            $this->status = true;
        }
    }
} 