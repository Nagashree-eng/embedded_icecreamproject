<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;


class OrdersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname', TextType::class, [
            'required' => false
        ])
            ->add('lastname', TextType::class, [
                'required' => false])
            ->add('ordersflavours', CollectionType::class, [

                'entry_type' => OrdersFlavoursType::class,
                'entry_options' => [
                    'attr' => [
                        'class' => 'item', // we want to use 'tr.item' as collection elements' selector
                    ],
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'required' => false,
                'by_reference' => false,
                'delete_empty' => true,

                'attr' => [
                    'class' => 'table ordersflavours-collection',
                ],

            ])
            ->add('orderstoppings', CollectionType::class, [

                'entry_type' => OrdersToppingsType::class,
                'entry_options' => [
                    'attr' => [
                        'class' => 'item', // we want to use 'tr.item' as collection elements' selector
                    ],
                ],
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'required' => false,
                'by_reference' => false,
                'delete_empty' => true,

                'attr' => [
                    'class' => 'table orderstoppings-collection',
                ],

            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Orders',

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'OrdersType';
    }
}
