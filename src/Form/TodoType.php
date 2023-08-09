<?php

namespace App\Form;

use App\Entity\Status;
use App\Entity\Todo;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('task', null, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    "placeholder" => "Your name"
                ],
            ])
            ->add('description', null, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    "placeholder" => "What to do"
                ],
            ])
            ->add('date', null, [
                'attr' => ['class' => 'form-control mb-2'],
                "widget" => "single_text"
            ])
            ->add('priority', ChoiceType::class, [     //take it from dokumentation- Type/Choice type
                'attr' => [
                    'class' => 'form-control mb-2',
                    "placeholder" => "How imoportant is it?"
                ],

                'choices'  => [
                    'Low' => 'Low',
                    'Normal' => 'Normal',
                    'Important' => 'Important',
                ]
            ])
            ->add('fkStatus', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'status',
                'label' => 'Status',
                'attr' => [
                    'class' => 'form-control mb-2'
                ]
            ])
            ->add('pictureUrl', FileType::class, [
                'label' => 'Upload Picture',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ],

                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image file',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
