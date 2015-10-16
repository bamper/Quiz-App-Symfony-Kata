<?php
/**
 * Created by PhpStorm.
 * User: red
 * Date: 10/16/15
 * Time: 8:14 PM
 */

namespace QuizBundle\Tests\Utils\Anwsers\Anwser;

use AppBundle\Entity\Quizset;
use AppBundle\Entity\Users;
use AppBundle\Entity\UsersToQuizset;
use QuizBundle\Utils\Quiz;


use QuizBundle\Utils\Anwsers\Anwser\AnwserFactory;
use QuizBundle\Utils\Anwsers\Anwser\Anwser;
use QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox;
use QuizBundle\Utils\Anwsers\Anwser\AnwserRadio;

class AnwserFactoryTest extends \PHPUnit_Framework_TestCase {


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
                ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserRadio', 'QuizBundle\Utils\Anwsers\Anwser\Anwser'
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
                'correct' => 3
            ), 'QuizBundle\Utils\Anwsers\Anwser\AnwserCheckbox', 'QuizBundle\Utils\Anwsers\Anwser\Anwser'
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
                'type' => "asd",
                'correct' => 3
            ), 'boolean', 'boolean'
            )
        );

    }

    /**
     * @dataProvider anwserRepository
     */
    public function testFactory($data, $class, $parent)
    {
        $object = AnwserFactory::createAnwser($data);

        if( is_object($object )){
            $this->assertInstanceOf($class, $object);
            $this->assertInstanceOf($parent, $object);
        }else{
            $this->assertInternalType($class, $object);
        }


    }


} 