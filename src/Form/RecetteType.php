<?php

namespace App\Form;

use App\Entity\Recette;
use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'attr'=> [
                'class' => 'form-control'
            ], 
            'label' => 'Nom',
            'label_attr' => [
                'class' => 'form-label'
            ]
        ])


        ->add('ingredient', EntityType::class, [
            'class'     => Ingredient::class,
            'expanded'  => true,
            'multiple'  => true,
            // 'entry_type' => IngredientType::class, 
            // 'entry_options' => ['label' => false],
            'attr'=> [
                'class' => 'form-control'
            ], 
            'label' => 'Ingrédients',
            'label_attr' => [
                'class' => 'form-label'
            ],
            'constraints' => [
                new NotBlank()
            ]
        ])
    

        ->add('submit', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-success mt-4'
            ], 
            'label' => 'Ajouter une recette'
        ])
    ;
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}


