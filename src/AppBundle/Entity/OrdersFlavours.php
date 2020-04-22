<?php
namespace AppBundle\Entity;
use AppBundle\Validator\Constraints as OrdersFlavoursAssert;
use AppBundle\Validator\Constraints\ContainsSameFlavours;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * OrdersFlavours
 *
 * @ORM\Table(name="ordersflavours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrdersFlavoursRepository")
 *
 *
 */
class OrdersFlavours
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
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="ordersflavours")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id",onDelete="CASCADE")
     *
     */
    public $orders;
    /**
     * @var int
     *
     *
     * @ORM\ManyToOne(targetEntity="Flavours", inversedBy="ordersflavours")
     * @ORM\JoinColumn(name="flavour_id", referencedColumnName="id")
     * @OrdersFlavoursAssert\ContainsSameFlavours
     */
    private $flavours;

    /**
     * @var int
     *
     * @ORM\Column(name="no_of_scoops", type="integer")
     * @Assert\NotBlank(message="please enter how much scoops you need")
     *
     *
     */
    private $noOfScoops;


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
     * Set noOfScoops
     *
     * @param integer $noOfScoops
     *
     * @return OrdersFlavours
     */
    public function setNoOfScoops($noOfScoops)
    {
        $this->noOfScoops = $noOfScoops;

        return $this;
    }

    /**
     * Get noOfScoops
     *
     * @return integer
     */
    public function getNoOfScoops()
    {
        return $this->noOfScoops;
    }

    /**
     * Set orders
     *
     * @param \AppBundle\Entity\Orders $orders
     *
     * @return OrdersFlavours
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
     * Set flavours
     *
     * @param \AppBundle\Entity\Flavours $flavours
     *
     * @return OrdersFlavours
     */
    public function setFlavours(\AppBundle\Entity\Flavours $flavours = null)
    {
        $this->flavours = $flavours;

        return $this;
    }

    /**
     * Get flavours
     *
     * @return \AppBundle\Entity\Flavours
     */
    public function getFlavours()
    {
        return $this->flavours;
    }


}
