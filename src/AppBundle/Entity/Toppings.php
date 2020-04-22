<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Toppings
 *
 * @ORM\Table(name="toppings")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToppingsRepository")
 */
class Toppings
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
     * @ORM\Column(name="toppingname", type="string", length=255)
     */
    private $toppingname;

    /**
     * @var string
     *
     * @ORM\Column(name="toppingamount", type="decimal", precision=10, scale=2)
     */
    private $toppingamount;

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
     * Set toppingname
     *
     * @param string $toppingname
     *
     * @return Toppings
     */
    public function setToppingname($toppingname)
    {
        $this->toppingname = $toppingname;

        return $this;
    }

    /**
     * Get toppingname
     *
     * @return string
     */
    public function getToppingname()
    {
        return $this->toppingname;
    }

    /**
     * Set toppingamount
     *
     * @param string $toppingamount
     *
     * @return Toppings
     */
    public function setToppingamount($toppingamount)
    {
        $this->toppingamount = $toppingamount;

        return $this;
    }

    /**
     * Get toppingamount
     *
     * @return string
     */
    public function getToppingamount()
    {
        return $this->toppingamount;
    }

}
