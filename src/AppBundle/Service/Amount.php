<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class Amount
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function addamount($user)
    {
        $flavouramount = 0;
        $toppingamount = 0;
        foreach ($user->getOrdersflavours() as $odflavour) {

            $flavour = $this->em->getRepository('AppBundle:Flavours')->findOneBy(array('id' => $odflavour->getFlavours()));
            $flavouramount = ($flavouramount+$flavour->getFlavouramount()* $odflavour->getNoOfScoops());
        }

        foreach ($user->getOrderstoppings() as $odtopping) {
            $topping = $this->em->getRepository('AppBundle:Toppings')->findOneBy(array('id' => $odtopping->getToppings()));

            $toppingamount = ($toppingamount+$topping->getToppingamount());
        }
        $totalamount = ($flavouramount+$toppingamount);

        return $totalamount;
    }
}
