<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersToQuizset
 *
 * @ORM\Table(name="users_to_quizset")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\UsersToQuizsetRepository")
 */
class UsersToQuizset
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
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=true)
     */
    private $dateEnd;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_email_sent", type="boolean", nullable=false)
     */
    private $isEmailSent = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="master_hash", type="string", length=200, nullable=false)
     */
    private $masterHash;



    /**
     * Set idSet
     *
     * @param integer $idSet
     *
     * @return UsersToQuizset
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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return UsersToQuizset
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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return UsersToQuizset
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
     * @return UsersToQuizset
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
     * Set isEmailSent
     *
     * @param boolean $isEmailSent
     *
     * @return UsersToQuizset
     */
    public function setIsEmailSent($isEmailSent)
    {
        $this->isEmailSent = $isEmailSent;

        return $this;
    }

    /**
     * Get isEmailSent
     *
     * @return boolean
     */
    public function getIsEmailSent()
    {
        return $this->isEmailSent;
    }

    /**
     * Set masterHash
     *
     * @param string $masterHash
     *
     * @return UsersToQuizset
     */
    public function setMasterHash($masterHash)
    {
        $this->masterHash = $masterHash;

        return $this;
    }

    /**
     * Get masterHash
     *
     * @return string
     */
    public function getMasterHash()
    {
        return $this->masterHash;
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
