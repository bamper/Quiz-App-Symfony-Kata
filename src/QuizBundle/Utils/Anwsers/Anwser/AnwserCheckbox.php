<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:30 PM
 */

namespace QuizBundle\Utils\Anwsers\Anwser;

use QuizBundle\Utils\Anwsers\Anwser\Anwser;

class AnwserCheckbox extends Anwser {

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
        $this->userAnwser = explode("|", $anwser);
    }

    protected function checkAnwsers()
    {
        $ans = array_flip($this->anwsers);

        $anwserNumber = array();
        foreach($this->userAnwser as $ua)
        {
            $anwserNumber[] = $ans[$ua] + 1;
        }

        $this->status = $this->isCorrectAnwsers($anwserNumber);
    }

    private function isCorrectAnwsers($anwsers)
    {
        $numAns = count($anwsers);
        $numCorr = count($this->correct);

        if( $numAns != $numCorr ){
            return false;
        }else{
            foreach($anwsers as $ans){
                if( !in_array($ans, $this->correct)) return false;
            }
        }
        return true;
    }
} 