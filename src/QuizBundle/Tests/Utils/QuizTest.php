<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/9/15
 * Time: 2:11 PM
 */

namespace QuizBundle\Tests\Utils;

use AppBundle\Entity\Question;
use AppBundle\Entity\Quizset;
use AppBundle\Entity\Users;
use AppBundle\Entity\UsersToQuizset;
use QuizBundle\Utils\Quiz;

class QuizTest extends \PHPUnit_Framework_TestCase {

    private $quiz;
    private $em;

    private $quizset;
    private $users;
    private $usersToQuizSet;
    private $userQuestions;
    private $questionSet;

    public function setUp()
    {
        $this->users = $this->setUsers();
        $this->quizset = $this->setQuiz();
        $this->usersToQuizSet = $this->setUsersToQuizset();
        $this->userQuestions = $this->setUserQuestions();
        $this->questionSet = $this->setQuestionsForSet();

        $this->em = $this->getMockBuilder('QuizBundle\Utils\Data\QuizData')
                    ->disableOriginalConstructor()
                    ->setMethods(array('getUser', 'getNearestQuiz','getUserQuizSet', 'getQuestionsForUser', 'checkUsersQuestions',
                                        'saveAns', 'saveEndTime', 'saveStartTime', 'getQuestionsForSet', 'saveToDoctrine'))
                    ->getMock();

        $this->em->method('getUser')
            ->will($this->returnValueMap($this->mapGetUser()));

        $this->em->method('getNearestQuiz')
            ->willReturn($this->quizset);

        $this->em->method('getUserQuizSet')
            ->will($this->returnValueMap($this->mapGetUserQuizSet()));

        $this->em->method('getQuestionsForUser')
            ->will($this->returnValueMap($this->mapgetQuestionsForUser()));

        $this->em->method('getQuestionsForSet')
            ->will($this->returnValueMap($this->mapgetQuestionsForSet()));

        $this->em->method('saveAns')
            ->willReturn(true);

        $this->em->method('saveToDoctrine')
            ->willReturn(true);

        $this->em->method('saveEndTime')
            ->willReturn(true);

        $this->em->method('checkUsersQuestions')
            ->willReturn(true);

        $this->em->method('saveStartTime')
            ->willReturn(true);
    }


    /**
     * @dataProvider quizProvider
     */
    public function testIsAllowed($userId, $isAllowed, $isActive, $decided, $numQuestions)
    {
        $quiz = new Quiz($userId, $this->em);

        $this->assertEquals($isAllowed, $quiz->isUserAllowed());
        $this->assertEquals($isActive, $quiz->isQuizActive());
        $this->assertEquals($decided, $quiz->decideWhatToDo());
        $this->assertEquals($numQuestions, count($quiz->getQuestionsForUser()));
    }

    public function testIsSetActive()
    {

    }

    public function quizProvider(){
       return array(
            array(1, true, true, 'start', 4),
            array(2, true, true, 'start', 4),
            array(3, true, true, 'start', 4),
            array(4, false, true, 'warning', 4),
            array(5, false, true, 'warning', 0),
       );
    }

    private function mapgetQuestionsForSet(){
        return $this->mapvalues2(array(1,1,1,1), $this->questionSet);
    }

    private function mapgetQuestionsForUser(){
        return $this->mapvalues3($this->users,
                                array($this->quizset,$this->quizset,$this->quizset,$this->quizset)  ,
                                array($this->userQuestions, $this->userQuestions, $this->userQuestions, $this->userQuestions)
        );
    }

    private function mapGetUserQuizSet()
    {
        return $this->mapvalues3(array(1,2,3,4), array(1,1,1,1)  ,$this->usersToQuizSet);
    }


    private function mapGetUser(){
        return $this->mapvalues2(array(1,2,3,4), $this->users);
    }

    private function setQuestionsForSet(){
        return array(
            ((new Question())->setId(1)->setIdSet(1)->setContent("asd")->setAns1('a')->setAns2('b')->setAns3('c')->setCorrect(1)->setType('radio')),
            ((new Question())->setId(2)->setIdSet(1)->setContent("asd")->setAns1('a')->setAns2('b')->setAns3('c')->setCorrect(1)->setType('radio')),
            ((new Question())->setId(3)->setIdSet(1)->setContent("asd")->setAns1('a')->setAns2('b')->setAns3('c')->setCorrect(1)->setType('radio')),
            ((new Question())->setId(4)->setIdSet(1)->setContent("asd")->setAns1('a')->setAns2('b')->setAns3('c')->setCorrect(1)->setType('radio'))
        );
    }

    private function setUserQuestions(){
        return array(
            array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'id' => 1,
                'idQuestion' => 1,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "radio",
                'correct' => 1
            ),
            array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'id' => 2,
                'idQuestion' => 2,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "radio",
                'correct' => 2
            ),
            array(
                'hashQuestion' => 123,
                'hashAns1' => 2,
                'hashAns2' => 3,
                'hashAns3' => 4,
                'id' => 3,
                'idQuestion' => 3,
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
                'id' => 4,
                'idQuestion' => 4,
                'content' => "asdasdad",
                'ans1' => "asdasda",
                'ans2' => "asdasda",
                'ans3' => "asdasdd",
                'type' => "radio",
                'correct' => 12
            )
        );
    }

    private function setUsersToQuizset(){
        return array(
            ((new UsersToQuizset())->setIdSet(1)->setIdUser(1)->setDateStart(NULL)->setDateEnd(NULL)->setMasterHash('a')),
            ((new UsersToQuizset())->setIdSet(2)->setIdUser(2)->setDateStart(NULL)->setDateEnd(NULL)->setMasterHash('b')),
            ((new UsersToQuizset())->setIdSet(3)->setIdUser(3)->setDateStart(1)->setDateEnd(NULL)->setMasterHash('c')),
            ((new UsersToQuizset())->setIdSet(4)->setIdUser(4)->setDateStart(1)->setDateEnd(10)->setMasterHash('d'))
        );
    }

    private function setQuiz(){
        return (new Quizset())
            ->setID(1)
            ->setDateStart(new \DateTime('2015-10-19 00:00:00'))
            ->setDateEnd(new \DateTime('2015-10-29 23:59:59'));

    }

    private function setUsers(){
        return array(
            ((new Users())->setId(1)->setEmail("test1@test.pl")),
            ((new Users())->setId(2)->setEmail("test2@test.pl")),
            ((new Users())->setId(3)->setEmail("test3@test.pl")),
            ((new Users())->setId(4)->setEmail("test4@test.pl"))
        );
    }

    private function mapvalues2($array1, $array2)
    {
            return array_map(
                function($val1, $val2)
                {
                    return array($val1, $val2);
                },
                $array1,
                $array2
            );
    }

    private function mapvalues3($array1, $array2, $array3)
    {
        return array_map(
            function($val1, $val2, $val3)
            {
                return array($val1, $val2, $val3);
            },
            $array1,
            $array2,
            $array3
        );
    }

} 