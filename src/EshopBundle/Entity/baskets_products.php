<?php

namespace EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * baskets_products
 *
 * @ORM\Table(name="baskets_products")
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\baskets_productsRepository")
 */
class baskets_products
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="basket_id", type="integer")
     */
    private $basketId;

    /**
     * @var int
     *
     * @ORM\Column(name="products_id", type="integer")
     */
    private $productsId;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set basketId
     *
     * @param integer $basketId
     *
     * @return baskets_products
     */
    public function setBasketId($basketId)
    {
        $this->basketId = $basketId;

        return $this;
    }

    /**
     * Get basketId
     *
     * @return int
     */
    public function getBasketId()
    {
        return $this->basketId;
    }

    /**
     * Set productsId
     *
     * @param integer $productsId
     *
     * @return baskets_products
     */
    public function setProductsId($productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get productsId
     *
     * @return int
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return baskets_products
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}

