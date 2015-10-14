<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:14 PM
 */

namespace QuizBundle\Utils\Anwsers\Anwser;

use QuizBundle\Utils\Anwsers\Anwser\AnwserFactory;


class AnwserCollection {

    private $anwsers;

    /*
     *
     * us.hashQuestion, us.hashAns1, us.hashAns2, us.hashAns3, us.hashUserAns, us.id, us.idQuestion,
                            q.content, q.ans1, q.ans2, q.ans3, q.type, q.correct
     *
     */
    public function __construct($anwsers)
    {
        $this->anwsers = array();

        foreach($anwsers as $ans)
        {
            $this->add($ans);
        }
    }

    public function add($anwser)
    {
        $this->anwsers[] = AnwserFactory::createAnwser($anwser);
    }

    public function getSize(){
        return count($this->anwsers);
    }

    public function countCorrect(){
        $i = 0;
        foreach($this->anwsers as $ans)
        {
            if( $ans->isCorrect() ){
                $i++;
            }
        }
        return $i;
    }
} 