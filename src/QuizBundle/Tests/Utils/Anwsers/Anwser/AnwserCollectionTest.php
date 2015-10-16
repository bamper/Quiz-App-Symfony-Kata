<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/16/15
 * Time: 8:15 PM
 */

namespace QuizBundle\Tests\Utils\Anwsers\Anwser;

use QuizBundle\Utils\Anwsers\Anwser\AnwserFactory;
use QuizBundle\Utils\Anwsers\Anwser\Anwser;
use QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox;
use QuizBundle\Utils\Anwsers\Anwser\AnwserRadio;
use QuizBundle\Utils\Anwsers\Anwser\AnwserCollection;

class AnwserCollectionTest extends \PHPUnit_Framework_TestCase {
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
            ), 0, 0
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
            ), 0, 0
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
            ), 0, 1
            )
        );

    }

    /**
     * @dataProvider anwserRepository
     */
    public function testCollection($data, $size, $correctNumber)
    {
        $collection =  new AnwserCollection();

        $this->assertEquals($size, $collection->getSize());


        $collection->add($data);

        $this->assertEquals($size + 1, $collection->getSize());
        $this->assertEquals($correctNumber, $collection->countCorrect());
    }
} 