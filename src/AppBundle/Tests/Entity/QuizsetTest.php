<?php
namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Quizset;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use AppBundle\DataFixtures\ORM\TestLoader;

class QuizsetTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    public function setUp(){
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;

    }



    public function testAdd()
    {
        $loader = new TestLoader();

        $objects = $loader->load($this->em);

        var_dump($objects);




    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}