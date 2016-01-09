<?php

namespace EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\productsRepository")
 */
class products
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="string", length=255)
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = true;

    /**
     * @ORM\OneToOne(targetEntity="EshopBundle\Entity\categories", cascade={"persist"})
     * @ORM\JoinColumn(name="categories_id", referencedColumnName="id")
     */
    private $categories;

    public function __construct()
    {
        $this->datetime = new \Datetime();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return products
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set abstract
     *
     * @param string $abstract
     *
     * @return products
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return products
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
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return products
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return products
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Images $images
     * @return products
     */

    public function setImages(Images $images = null)
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return Images
     */

    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set categories
     *
     * @param \EshopBundle\Entity\categories $categories
     *
     * @return products
     */
    public function setCategories(\EshopBundle\Entity\categories $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Set categories
     *
     * @param \EshopBundle\Entity\categories $categories
     *
     * @return products
     */
    public function getCategories()
    {
        return $this->categories;
    }


    public function addCategories(Categories $categories)
    {
        $this->categories[] = $categories;
        return $this;
    }


    public function removeCategories(Categories $categories)
    {
        $this->categories->removeElement($categories);
    }


}
