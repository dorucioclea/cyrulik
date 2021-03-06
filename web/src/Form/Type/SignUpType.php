<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

final class SignUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('login', EmailType::class, [
            'constraints' => [
                new NotBlank(),
                new Email(),
            ],
        ]);

        $builder->add('firstname', TextType::class, [
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        $builder->add('lastname', TextType::class, [
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        $builder->add('password', RepeatedType::class, [
            'first_options' => ['label' => 'Password'],
            'second_options' => ['label' => 'Repeat Password'],
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'constraints' => [
                new NotBlank(),
            ],
        ]);
    }
}
