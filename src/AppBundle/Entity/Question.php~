<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\QuestionRepository")
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_set", type="integer", nullable=false)
     */
    private $idSet;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="ans_1", type="string", length=255, nullable=false)
     */
    private $ans1;

    /**
     * @var string
     *
     * @ORM\Column(name="ans_2", type="string", length=255, nullable=false)
     */
    private $ans2;

    /**
     * @var string
     *
     * @ORM\Column(name="ans_3", type="string", length=255, nullable=false)
     */
    private $ans3;

    /**
     * @var integer
     *
     * @ORM\Column(name="correct", type="integer", nullable=false)
     */
    private $correct = '1';



    /**
     * Set idSet
     *
     * @param integer $idSet
     *
     * @return Question
     */
    public function setIdSet($idSet)
    {
        $this->idSet = $idSet;

        return $this;
    }

    /**
     * Get idSet
     *
     * @return integer
     */
    public function getIdSet()
    {
        return $this->idSet;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Question
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set ans1
     *
     * @param string $ans1
     *
     * @return Question
     */
    public function setAns1($ans1)
    {
        $this->ans1 = $ans1;

        return $this;
    }

    /**
     * Get ans1
     *
     * @return string
     */
    public function getAns1()
    {
        return $this->ans1;
    }

    /**
     * Set ans2
     *
     * @param string $ans2
     *
     * @return Question
     */
    public function setAns2($ans2)
    {
        $this->ans2 = $ans2;

        return $this;
    }

    /**
     * Get ans2
     *
     * @return string
     */
    public function getAns2()
    {
        return $this->ans2;
    }

    /**
     * Set ans3
     *
     * @param string $ans3
     *
     * @return Question
     */
    public function setAns3($ans3)
    {
        $this->ans3 = $ans3;

        return $this;
    }

    /**
     * Get ans3
     *
     * @return string
     */
    public function getAns3()
    {
        return $this->ans3;
    }

    /**
     * Set correct
     *
     * @param integer $correct
     *
     * @return Question
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return integer
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
