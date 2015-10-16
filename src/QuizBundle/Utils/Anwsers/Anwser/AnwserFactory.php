<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/14/15
 * Time: 5:28 PM
 */

namespace QuizBundle\Utils\Anwsers\Anwser;


use QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox;
use QuizBundle\Utils\Anwsers\Anwser\AnwserRadio;

class AnwserFactory {

    public static function createAnwser($anwserData)
    {
        if( $anwserData['type'] == "radio")
        {
            return new AnwserRadio($anwserData);
        }
        else if( $anwserData['type'] == "checkbox")
        {
            return new AnwserCheckbox($anwserData);
        }
        return false;
    }
} 