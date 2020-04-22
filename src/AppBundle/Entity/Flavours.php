<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Flavours
 *
 * @ORM\Table(name="flavours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FlavoursRepository")
 */
class Flavours
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
     * @ORM\Column(name="flavourname", type="string", length=255)
     */
    private $flavourname;
    /**
     * @var string
     *
     * @ORM\Column(name="flavouramount", type="decimal", precision=10, scale=2)
     */
    private $flavouramount;

    /**
     * @ORM\OneToMany(targetEntity="OrdersFlavours", mappedBy="flavours",cascade={"persist"})
     * @Assert\Valid()
     */
    private $ordersflavours;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ordersflavours = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set flavourname
     *
     * @param string $flavourname
     *
     * @return Flavours
     */
    public function setFlavourname($flavourname)
    {
        $this->flavourname = $flavourname;

        return $this;
    }

    /**
     * Get flavourname
     *
     * @return string
     */
    public function getFlavourname()
    {
        return $this->flavourname;
    }

    /**
     * Set flavouramount
     *
     * @param string $flavouramount
     *
     * @return Flavours
     */
    public function setFlavouramount($flavouramount)
    {
        $this->flavouramount = $flavouramount;

        return $this;
    }

    /**
     * Get flavouramount
     *
     * @return string
     */
    public function getFlavouramount()
    {
        return $this->flavouramount;
    }

    /**
     * Add ordersflavour
     *
     * @param \AppBundle\Entity\OrdersFlavours $ordersflavour
     *
     * @return Flavours
     */
    public function addOrdersflavour(\AppBundle\Entity\OrdersFlavours $ordersflavour)
    {
        $this->ordersflavours[] = $ordersflavour;
        $ordersflavour->setFlavours($this);
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
            $ordersflavour->setFlavours(null);
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
}
