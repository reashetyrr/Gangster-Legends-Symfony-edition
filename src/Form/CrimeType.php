<?php

namespace App\Form;

use App\Entity\Crime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CrimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('cooldown')
            ->add('money')
            ->add('max_money')
            ->add('bullets')
            ->add('max_bullets')
            ->add('exp')
            ->add('level')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Crime::class,
        ]);
    }
}
