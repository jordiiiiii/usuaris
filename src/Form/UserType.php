<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
//            ->add('roles')
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'choices'  => [
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_CAP' => 'ROLE_CAP',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                ]
            ])
            ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
