<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $role = count($options['data']->getRoles())>0 ? $options['data']->getRoles()[0] : 'ROLE_USER';
        $builder
            ->add('email')
            ->add('password')
            ->add('roles', ChoiceType::class, array(
                'choices'=> [
                    'User' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN'
                ],
                'mapped'=> false,
                'data'=>$role
            ))
            ->add('firstname')
            ->add('lastname')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
