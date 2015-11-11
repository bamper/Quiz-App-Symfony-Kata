<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormProd
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FormProd
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
     * @ORM\Column(name="formVersion", type="string", length=10)
     */
    private $formVersion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_product", type="integer")
     */
    private $idProduct;


    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TestProduct")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     * })
     *
     */
    private $product;

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
     * Set formVersion
     *
     * @param string $formVersion
     *
     * @return FormProd
     */
    public function setFormVersion($formVersion)
    {
        $this->formVersion = $formVersion;

        return $this;
    }

    /**
     * Get formVersion
     *
     * @return string
     */
    public function getFormVersion()
    {
        return $this->formVersion;
    }

    /**
     * Set idProduct
     *
     * @param integer $idProduct
     *
     * @return FormProd
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

    public function getProduct(){
        return $this->product;
    }
    public function setProduct($product){
        $this->product = $product;
        $this->idProduct = $product->getId();
        return $this;
    }
    public function __toString()
    {
        $productName = $this->product->getName();

        return "<span class='product-form-name'>{$productName}</span>";
    }
}

