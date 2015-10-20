<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/16/15
 * Time: 8:13 PM
 */

namespace QuizBundle\Tests\Utils\Anwsers;


use QuizBundle\Utils\Anwsers\QuizCollection;

class QuizCollectionTest extends \PHPUnit_Framework_TestCase{

    private $stub;

    public function setUp(){
        $this->stub = $this->getMockBuilder('QuizBundle\Utils\Data\QuizData')
            ->disableOriginalConstructor()
            ->setMethods(array('getUserAnwsers'))
            ->getMock();

        $returnMap = array(
            array(
                1, 9, array(
                array(
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
                ),
                array(
                    'hashQuestion' => 123,
                    'hashAns1' => 2,
                    'hashAns2' => 3,
                    'hashAns3' => 4,
                    'hashUserAns' => 4,
                    'id' => 1,
                    'idQuestion' => 3,
                    'content' => "asdasdad",
                    'ans1' => "asdasda",
                    'ans2' => "asdasda",
                    'ans3' => "asdasdd",
                    'type' => "radio",
                    'correct' => 3
                )
            )
            ),
            array(
                2, 9, array(
                array(
                    'hashQuestion' => 123,
                    'hashAns1' => 2,
                    'hashAns2' => 3,
                    'hashAns3' => 4,
                    'hashUserAns' => 4,
                    'id' => 1,
                    'idQuestion' => 2,
                    'content' => "asdasdad",
                    'ans1' => "asdasda",
                    'ans2' => "asdasda",
                    'ans3' => "asdasdd",
                    'type' => "radio",
                    'correct' => 3
                ),
                array(
                    'hashQuestion' => 123,
                    'hashAns1' => 2,
                    'hashAns2' => 3,
                    'hashAns3' => 4,
                    'hashUserAns' => "2|4",
                    'id' => 1,
                    'idQuestion' => 3,
                    'content' => "asdasdad",
                    'ans1' => "asdasda",
                    'ans2' => "asdasda",
                    'ans3' => "asdasdd",
                    'type' => "checkbox",
                    'correct' => 13
                )
            )
            ),
            array(
                3, 9, array()
            )


        );

        $this->stub->method('getUserAnwsers')
            ->will($this->returnValueMap($returnMap));

    }

    /**
     * @dataProvider quizUserProvider
     */
    public function testQuizCollection($user, $correct)
    {
        $collection = QuizCollection::create($this->stub, array($user));
        $return = $collection->getOutcome();

        $this->assertEquals(1, count($return));
        $this->assertEquals($correct, $return[0]['totalCorrect']);
    }

    public function quizUserProvider(){
        return array(
            array(
                array('id' => 1, 'email' => 'a@test.pl', 'idSet' => 9, 'dateStart' => 10, 'dateEnd' => 10),
                1
            ),
            array(
                array('id' => 2, 'email' => 'a@test.pl', 'idSet' => 9, 'dateStart' => 10, 'dateEnd' => 10),
                2
            ),
            array(
                array('id' => 3, 'email' => 'a@test.pl', 'idSet' => 9, 'dateStart' => 10, 'dateEnd' => 10),
                0
            )
        );
    }
} 