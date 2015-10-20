<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/16/15
 * Time: 8:14 PM
 */

namespace QuizBundle\Tests\Utils\Anwsers\Anwser;

use QuizBundle\Utils\Anwsers\Anwser\AnwserFactory;
use QuizBundle\Utils\Anwsers\Anwser\Anwser;
use QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox;
use QuizBundle\Utils\Anwsers\Anwser\AnwserRadio;

class AnwserTest extends \PHPUnit_Framework_TestCase {

    public function anwserRepository(){

        return array(
            array(array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'hashUserAns' => 3,
                'id' => 1,
                'idQuestion' => 2,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "radio",
                'correct' => 3
            ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserRadio', false
            ),
            array(array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'hashUserAns' => 3,
                'id' => 1,
                'idQuestion' => 2,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "checkbox",
                'correct' => 1
            ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox', false
            ),
            array(array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'hashUserAns' => 3,
                'id' => 1,
                'idQuestion' => 2,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "radio",
                'correct' => 2
            ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserRadio', true
            ),
            array(array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'hashUserAns' => 3,
                'id' => 1,
                'idQuestion' => 2,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "checkbox",
                'correct' => 12
            ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox', false
            ),
            array(array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'hashUserAns' => "3|2",
                'id' => 1,
                'idQuestion' => 2,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "checkbox",
                'correct' => 12
            ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox', true
            ),
            array(array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'hashUserAns' => "3|2",
                'id' => 1,
                'idQuestion' => 2,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "checkbox",
                'correct' => 2
            ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox', false
            )
        );

    }

    /**
     * @dataProvider anwserRepository
     */
    public function testAnwser($data, $class, $correct)
    {
        $object = AnwserFactory::createAnwser($data);

        $this->assertInstanceOf($class, $object);
        $this->assertEquals($correct, $object->isCorrect());
    }

} 