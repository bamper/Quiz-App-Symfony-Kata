<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/9/15
 * Time: 2:11 PM
 */

namespace QuizBundle\Tests\Utils;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\Users;
use AppBundle\Entity\UsersToQuizset;
use QuizBundle\Utils\Quiz;

class QuizTest extends \PHPUnit_Framework_TestCase {

    private $quiz;
    private $em;

    public function setUp()
    {
        $this->em = $this->getMockBuilder('QuizBundle\Utils\Data\QuizData')
                    ->disableOriginalConstructor()
                    ->getMock();

        $this->em->method('getNearestQuiz')
            ->willReturn((new Quizset())
                            ->setID(1)
                            ->setDateStart(new \DateTime('2015-10-09 00:00:00'))
                            ->setDateEnd(new \DateTime('2015-10-09 23:59:59'))
            );

        $this->em->method('getUser')
                    ->willReturn((new Users())
                        ->setId(1)
                        ->setEmail('test@test.pl')
            );

        $this->em->method('getUserQuizSet')
                    ->willReturn((new UsersToQuizset())
                    ->setIdSet(1)
                    ->setIdUser(1)
                    ->setIsEmailSent(1)
                    ->setDateEnd(10)
                    ->setDateStart(20)
                    ->setMasterHash("asdasdasd")
            );

        $this->quiz = new Quiz(1,$this->em);
    }


    public function testIsAllowed()
    {

        $this->assertEquals(false,$this->quiz->isUserAllowed());
    }

    public function testIsSetActive()
    {

        $this->assertEquals(true, $this->quiz->isQuizActive());
    }



} 