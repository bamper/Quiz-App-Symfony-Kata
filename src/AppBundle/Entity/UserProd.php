<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * UserProd
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserProd
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
     * @var integer
     *
     * @ORM\Column(name="id_userform", type="integer")
     */
    private $idUserform;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_product", type="integer")
     */
    private $idProduct;



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
     * Set idUserform
     *
     * @param integer $idUserform
     *
     * @return UserProd
     */
    public function setIdUserform($idUserform)
    {
        $this->idUserform = $idUserform;

        return $this;
    }

    /**
     * Get idUserform
     *
     * @return integer
     */
    public function getIdUserform()
    {
        return $this->idUserform;
    }

    /**
     * Set idProduct
     *
     * @param integer $idProduct
     *
     * @return UserProd
     */
    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    /**
     * Get idProduct
     *
     * @return integer
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }


    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TestProduct")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     * })
     *
     */
    private $product;

    public function getProduct(){
        return $this->product;
    }
    public function setProduct($product){
        $this->product = $product;
        $this->idProduct = $product->getId();
        return $this;
    }


    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserForm")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_userform", referencedColumnName="id")
     * })
     *
     */
    private $user;

    public function getUser(){
        return $this->user;
    }
    public function setUser($product){
        $this->user = $product;

        return $this;
    }
}

