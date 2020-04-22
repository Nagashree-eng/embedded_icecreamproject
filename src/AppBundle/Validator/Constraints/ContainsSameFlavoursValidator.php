<?php

namespace AppBundle\Validator\Constraints;

use AppBundle\Entity\Flavours;
use AppBundle\Entity\OrdersFlavours;
use AppBundle\Entity\Orders;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use AppBundle\Repository\OrdersFlavoursRepository;

class ContainsSameFlavoursValidator extends ConstraintValidator
{
    private $flavours;

    public function validate($value, Constraint $constraint)
    {
        $this->flavours[] = $value->getflavourname();
        $array=($this->flavours);

            $array_temp = array();

            foreach($array as $val)
            {
                if (!in_array($val, $array_temp))
                {
                    $array_temp[] = $val;
                }
                else
                {
                  $this->context->buildViolation( $val." ".$constraint->message )
                            ->atPath('flavourId')
                        ->addViolation();
                }
            }


    }
}