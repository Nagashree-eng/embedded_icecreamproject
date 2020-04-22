<?php

namespace AppBundle\Form;

use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdersFlavoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('flavours', EntityType::class, array(

            'class' => 'AppBundle:Flavours',
            'choice_label' => 'flavourname',

        ))
            ->add('noOfScoops', IntegerType::class,
                array(
                    'required' => false,
                    'constraints' => array(
                        new Regex(array(
                                'pattern' => '/^[1-9]\d*$/',
                                'message' => 'Please use only positive numbers.'
                            )
                        ),

                    )
                ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\OrdersFlavours',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'OrdersFlavoursType';
    }


}
