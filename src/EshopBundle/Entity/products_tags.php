<?php

namespace EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * products_tags
 *
 * @ORM\Table(name="products_tags")
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\products_tagsRepository")
 */
class products_tags
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
     * @ORM\Column(name="products_id", type="integer")
     */
    private $productsId;

    /**
     * @var int
     *
     * @ORM\Column(name="tags_id", type="integer")
     */
    private $tagsId;


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
     * Set productsId
     *
     * @param integer $productsId
     *
     * @return products_tags
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
     * Set tagsId
     *
     * @param integer $tagsId
     *
     * @return products_tags
     */
    public function setTagsId($tagsId)
    {
        $this->tagsId = $tagsId;

        return $this;
    }

    /**
     * Get tagsId
     *
     * @return int
     */
    public function getTagsId()
    {
        return $this->tagsId;
    }
}

