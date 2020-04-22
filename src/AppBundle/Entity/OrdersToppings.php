<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersToppings
 *
 * @ORM\Table(name="orderstoppings")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersToppingsRepository")
 */
class OrdersToppings
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
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="orderstoppings")
     * @ORM\JoinColumn(name="order_id",  referencedColumnName="id",onDelete="CASCADE")
     */
    private $orders;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Toppings", inversedBy="orderstoppings")
     * @ORM\JoinColumn(name="topping_id",  referencedColumnName="id")
     *
     */
    private $toppings;

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
     * Set orders
     *
     * @param \AppBundle\Entity\Orders $orders
     *
     * @return OrdersToppings
     */
    public function setOrders(\AppBundle\Entity\Orders $orders = null)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return \AppBundle\Entity\Orders
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set toppings
     *
     * @param \AppBundle\Entity\Toppings $toppings
     *
     * @return OrdersToppings
     */
    public function setToppings(\AppBundle\Entity\Toppings $toppings = null)
    {
        $this->toppings = $toppings;

        return $this;
    }

    /**
     * Get toppings
     *
     * @return \AppBundle\Entity\Toppings
     */
    public function getToppings()
    {
        return $this->toppings;
    }
}
