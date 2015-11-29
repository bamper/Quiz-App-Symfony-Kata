<?php

namespace KataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use KataBundle\Entity\UserGroup;
use KataBundle\Entity\School;
use KataBundle\Entity\Adress;
use KataBundle\Entity\Customer;

/**
 * User
 *
 * @ORM\Table(name="user_kata")
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     *
     */
    private $groups;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="School")
     * @ORM\JoinTable(name="users_schools",
     *          joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *          inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     *          )
     *
     */
    private $schools;

    /**
     * @var Customer
     * @ORM\OneToOne(targetEntity="Customer", mappedBy="user")
     *
     */
    private $customer;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @var Adress
     *
     * @ORM\ManyToMany(targetEntity="Adress")
     * @ORM\JoinColumn(name="adress_id", referencedColumnName="id")
     */
    private $adress;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private $friendsWithMe;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\JoinTable(name="friends",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="friend_id", referencedColumnName="id")}
     * )
     */
    private $myFriends;


    public function __construct()
    {
        $this->schools = new ArrayCollection();
        $this->groups = new ArrayCollection();

        $this->friendsWithMe = new ArrayCollection();
        $this->myFriends = new ArrayCollection();
    }

    /**
     * @return Adress
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param Adress $adress
     * @return $this
     */
    public function setAdress(Adress $adress)
    {
        $this->adress = $adress;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return User
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setParent(User $user)
    {
        $this->parent = $user;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param UserGroup $group
     * @return $this
     */
    public function setGroups(UserGroup $group)
    {
        $this->groups[] = $group;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getSchools()
    {
        return $this->schools;
    }

    /**
     * @param School $school
     * @return $this
     */
    public function setSchools(School $school)
    {
        $this->schools[] = $school;
        return $this;
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
     * @return User
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

