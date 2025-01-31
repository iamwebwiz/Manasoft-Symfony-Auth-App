<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    /**
     * Build the form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control', 'required' => true, 'autofocus' => true]
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'form-control', 'required' => true]
            ])
            ->add('first_name', TextType::class, [
                'attr' => ['class' => 'form-control', 'required' => true]
            ])
            ->add('last_name', TextType::class, [
                'attr' => ['class' => 'form-control', 'required' => true]
            ])
            ->add('birth_date', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control', 'required' => true]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
