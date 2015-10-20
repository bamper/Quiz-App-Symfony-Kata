<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/16/15
 * Time: 8:56 PM
 */

namespace QuizBundle\Tests\Utils\Anwsers\User;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\Users;
use AppBundle\Entity\UsersToQuizset;
use QuizBundle\Utils\Quiz;

use QuizBundle\Utils\Anwsers\User\QuizUser;

class QuizUserTest extends \PHPUnit_Framework_TestCase{

    private $stub;

    public function setUp(){
        $this->stub = $this->getMockBuilder('QuizBundle\Utils\Data\QuizData')
            ->disableOriginalConstructor()
            ->setMethods(array('getUserAnwsers'))
            ->getMock();
    }


    /**
     * @dataProvider userAnwserProvider
     */
    public function testUser($studData, $userData, $correct)
    {



        $this->stub->method('getUserAnwsers')
            ->will($this->returnValueMap(array($studData)));

        $user = QuizUser::create($userData);
        $user->setAnwsers($this->stub);

        $outcome = $user->getOutcome();


        $this->assertNotEmpty($outcome);
        $this->assertEquals($correct, $outcome['totalCorrect']);

    }

    public function userAnwserProvider(){
        return array(
            array(
                array(
                    1, 9, array(array(
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
                ))
                ),
                array(
                    'id' => 1, 'email' => 'a@test.pl', 'idSet' => 9, 'dateStart' => 10, 'dateEnd' => 10
                ),
                0
            ),
            array(
                array(
                    1, 9, array(array(
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
                ))
                ),
                array(
                    'id' => 1, 'email' => 'a@test.pl', 'idSet' => 9, 'dateStart' => 10, 'dateEnd' => 10
                ),
                1
            ),
            array(
                array(
                    1, 9, array()
                ),
                array(
                    'id' => 1, 'email' => 'a@test.pl', 'idSet' => 9, 'dateStart' => 10, 'dateEnd' => 10
                ),
                0
            )
        );
    }

} 