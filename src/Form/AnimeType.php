<?php

namespace App\Form;
use App\Entity\Anime;
use App\Entity\ListAnime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '30'
                ],
                'label' => 'Titre',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ]
            ])
            ->add('genre', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '30'
                ],
                'label' => 'Genre',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ]
            ] )
            ->add('description', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '30'
                ],
                'label' => 'Description',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ]
            ])
            ->add('auteur',  TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '30'
                ],
                'label' => 'Auteur',
                'label_attr' =>[
                    'class'=> 'form-label mt-4'
                ]
            ])
            ->add('date_sortie',)
            ->add('submit', SubmitType::class, [
                'attr' => [
                  'class' => 'btn btn-primary'
                ]
            ,
            'label' => 'Créer mon anime'
            
        ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Anime::class,
        ]);
    }
}
