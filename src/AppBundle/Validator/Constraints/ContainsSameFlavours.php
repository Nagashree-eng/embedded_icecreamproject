<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */


class ContainsSameFlavours extends Constraint{

    public $message = ' flavour already exist.';

}