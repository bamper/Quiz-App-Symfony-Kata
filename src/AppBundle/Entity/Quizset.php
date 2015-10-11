<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinColumns;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Quizset
 *
 * @ORM\Table(name="quizset")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\QuizsetRepository")
 */
class Quizset
{
    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=false)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=false)
     */
    private $dateEnd;

    /**
     *
     * @ORM\OneToMany(targetEntity="Question", mappedBy="quizset")
     */
    private $questions;

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Quizset
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return Quizset
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
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

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Quizset
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function isActiveNow(){
        $now = new \DateTime('NOW');
        if( $now >= $this->dateStart && $now <= $this->dateEnd )
        {
            return true;
        }else{
            return false;
        }
    }

    public function __toString(){
        return "( ".$this->dateStart->format("Y-m-d H:i") . " - " . $this->dateEnd->format('Y-m-d H:i') . " )" ;
    }

}
