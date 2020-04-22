<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersRepository")
 */
class Orders
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
     * @ORM\Column(name="firstname", type="string", length=255,nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(min=4)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255,nullable=false)
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2)
     */
    private $amount;

    /**
     * @ORM\OneToMany(targetEntity="OrdersFlavours", mappedBy="orders",cascade={"persist"})
     * @Assert\Valid()
     */
    public $ordersflavours;

    /**
     * @ORM\OneToMany(targetEntity="OrdersToppings", mappedBy="orders",cascade={"persist"})
     * @Assert\Valid()
     */
    private $orderstoppings;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ordersflavours = new \Doctrine\Common\Collections\ArrayCollection();
        $this->orderstoppings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Orders
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Orders
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Orders
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Add ordersflavour
     *
     * @param \AppBundle\Entity\OrdersFlavours $ordersflavour
     *
     * @return Orders
     */
    public function addOrdersflavour(\AppBundle\Entity\OrdersFlavours $ordersflavour)
    {
        $this->ordersflavours[] = $ordersflavour;
        $ordersflavour->setOrders($this);
        return $this;
    }

    /**
     * Remove ordersflavour
     *
     * @param \AppBundle\Entity\OrdersFlavours $ordersflavour
     */
    public function removeOrdersflavour(\AppBundle\Entity\OrdersFlavours $ordersflavour)
    {
        if ($this->ordersflavours->contains($ordersflavour)) {
            $ordersflavour->setOrders(null);
            $this->ordersflavours->removeElement($ordersflavour);
        }
    }

    /**
     * Get ordersflavours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrdersflavours()
    {
        return $this->ordersflavours;
    }

    /**
     * Add orderstopping
     *
     * @param \AppBundle\Entity\OrdersToppings $orderstopping
     *
     * @return Orders
     */
    public function addOrderstopping(\AppBundle\Entity\OrdersToppings $orderstopping)
    {
        $this->orderstoppings[] = $orderstopping;
        $orderstopping->setOrders($this);
        return $this;
    }

    /**
     * Remove orderstopping
     *
     * @param \AppBundle\Entity\OrdersToppings $orderstopping
     */
    public function removeOrderstopping(\AppBundle\Entity\OrdersToppings $orderstopping)
    {
        if ($this->orderstoppings->contains($orderstopping)) {
            $orderstopping->setOrders(null);
            $this->orderstoppings->removeElement($orderstopping);
        }
    }

    /**
     * Get orderstoppings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderstoppings()
    {
        return $this->orderstoppings;
    }
}



