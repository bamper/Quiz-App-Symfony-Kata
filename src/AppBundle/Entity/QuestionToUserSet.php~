<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionToUserSet
 *
 * @ORM\Table(name="question_to_user_set")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\QuestionToUserSetRepository")
 */
class QuestionToUserSet
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
     * @var integer
     *
     * @ORM\Column(name="id_question", type="integer", nullable=false)
     */
    private $idQuestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_question", type="string", length=200, nullable=false)
     */
    private $hashQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_ans_1", type="string", length=200, nullable=false)
     */
    private $hashAns1;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_ans_2", type="string", length=200, nullable=false)
     */
    private $hashAns2;

    /**
     * @var string
     *
     * @ORM\Column(name="hash_ans_3", type="string", length=200, nullable=false)
     */
    private $hashAns3;

    /**
     * @var string
     *
     * @ORM\Column(name="hah_user_ans", type="string", length=200, nullable=false)
     */
    private $hahUserAns;



    /**
     * Set idSet
     *
     * @param integer $idSet
     *
     * @return QuestionToUserSet
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
     * Set idQuestion
     *
     * @param integer $idQuestion
     *
     * @return QuestionToUserSet
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    /**
     * Get idQuestion
     *
     * @return integer
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return QuestionToUserSet
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set hashQuestion
     *
     * @param string $hashQuestion
     *
     * @return QuestionToUserSet
     */
    public function setHashQuestion($hashQuestion)
    {
        $this->hashQuestion = $hashQuestion;

        return $this;
    }

    /**
     * Get hashQuestion
     *
     * @return string
     */
    public function getHashQuestion()
    {
        return $this->hashQuestion;
    }

    /**
     * Set hashAns1
     *
     * @param string $hashAns1
     *
     * @return QuestionToUserSet
     */
    public function setHashAns1($hashAns1)
    {
        $this->hashAns1 = $hashAns1;

        return $this;
    }

    /**
     * Get hashAns1
     *
     * @return string
     */
    public function getHashAns1()
    {
        return $this->hashAns1;
    }

    /**
     * Set hashAns2
     *
     * @param string $hashAns2
     *
     * @return QuestionToUserSet
     */
    public function setHashAns2($hashAns2)
    {
        $this->hashAns2 = $hashAns2;

        return $this;
    }

    /**
     * Get hashAns2
     *
     * @return string
     */
    public function getHashAns2()
    {
        return $this->hashAns2;
    }

    /**
     * Set hashAns3
     *
     * @param string $hashAns3
     *
     * @return QuestionToUserSet
     */
    public function setHashAns3($hashAns3)
    {
        $this->hashAns3 = $hashAns3;

        return $this;
    }

    /**
     * Get hashAns3
     *
     * @return string
     */
    public function getHashAns3()
    {
        return $this->hashAns3;
    }

    /**
     * Set hahUserAns
     *
     * @param string $hahUserAns
     *
     * @return QuestionToUserSet
     */
    public function setHahUserAns($hahUserAns)
    {
        $this->hahUserAns = $hahUserAns;

        return $this;
    }

    /**
     * Get hahUserAns
     *
     * @return string
     */
    public function getHahUserAns()
    {
        return $this->hahUserAns;
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
