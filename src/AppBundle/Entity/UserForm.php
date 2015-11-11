<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * UserForm
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserForm
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserProd", mappedBy="userProducts")
     * @ORM\JoinColumn(name="id", referencedColumnName="id_userform")
     */
    protected $userProducts;

    public function __construct()
    {
        $this->userProducts = new ArrayCollection();
    }

    public function getUserProducts()
    {
        return $this->userProducts;
    }

    public function setUserProducts($up)
    {
        $this->userProducts = $up;
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
     * Set name
     *
     * @param string $name
     *
     * @return UserForm
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

