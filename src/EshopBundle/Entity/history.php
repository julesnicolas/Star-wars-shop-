<?php

namespace EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * history
 *
 * @ORM\Table(name="history")
 * @ORM\Entity(repositoryClass="EshopBundle\Repository\historyRepository")
 */
class history
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
     * @ORM\Column(name="total", type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ordered_on", type="datetime")
     */
    private $orderedOn;

    /**
     * @var int
     *
     * @ORM\Column(name="validate", type="smallint")
     */
    private $validate;

    /**
     * @ORM\ManyToOne(targetEntity="EshopBundle\Entity\users", inversedBy="history")
     * @ORM\JoinColumn(nullable=true)
     */
    private $username;


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
     * Set total
     *
     * @param string $total
     *
     * @return history
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set orderedOn
     *
     * @param \DateTime $orderedOn
     *
     * @return history
     */
    public function setOrderedOn($orderedOn)
    {
        $this->orderedOn = $orderedOn;

        return $this;
    }

    /**
     * Get orderedOn
     *
     * @return \DateTime
     */
    public function getOrderedOn()
    {
        return $this->orderedOn;
    }

    /**
     * Set validate
     *
     * @param integer $validate
     *
     * @return history
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate
     *
     * @return int
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * Get username
     *
     * @return \EshopBundle\Entity\users
     *
     * @return history
     */
    public function setUsername(\EshopBundle\Entity\users $username= null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return \EshopBundle\Entity\users
     */
    public function getUsername()
    {
        return $this->username;
    }
}
