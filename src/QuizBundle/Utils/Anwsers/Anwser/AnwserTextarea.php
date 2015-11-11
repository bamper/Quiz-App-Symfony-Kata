<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:30 PM
 */

namespace QuizBundle\Utils\Anwsers\Anwser;

use QuizBundle\Utils\Anwsers\Anwser\Anwser;

class AnwserTextarea extends Anwser {

    public function __construct($data)
    {
        $this->type = $data['type'];
        $this->status = false;
        $this->idQuestion = $data['idQuestion'];
        $this->prepareCorrectAnwser($data['correct']);
        $this->prepareUserAnwser($data['hashUserAns']);
        $this->prepareAnwsers($data);
        $this->checkAnwsers();
    }


    protected function prepareCorrectAnwser($correct)
    {
        $tmp = array();
        $length = strlen($correct);
        $str = (string)$correct;


        for($i=0;$i<$length;$i++ )
        {
            $tmp[] = (int)$str[$i];
        }


        $this->correct = $tmp;
    }

    protected function prepareUserAnwser($anwser)
    {
        $this->userAnwser = $anwser;
    }

    protected function checkAnwsers()
    {

        $this->status = $this->isCorrectAnwsers(null);
    }

    public function getOpenAnwser()
    {

        return $this->userAnwser;
    }

    private function isCorrectAnwsers($anwsers)
    {
        return false;
    }
} 