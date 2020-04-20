<?php

namespace App\Form;

use App\Entity\Gang;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GangType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('bank')
            ->add('info')
            ->add('description')
            ->add('location')
            ->add('level')
            ->add('boss')
            ->add('underboss')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gang::class,
        ]);
    }
}
