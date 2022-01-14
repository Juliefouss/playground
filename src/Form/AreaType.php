<?php

namespace App\Form;

use App\Entity\Area;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AreaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextareaType::class, ['label'=>'Nom '])
            ->add('adress', TextareaType::class, ['label'=>'Adresse'])
            ->add('postalcode', IntegerType::class,['label'=>' Code postal'])
            ->add('ville', TextareaType::class, ['label'=>'Ville'])
            ->add('decription', TextareaType::class, ['label'=>'Description'])
            ->add('pmr',ChoiceType::class,['label'=>' Accès PMR?',

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',
                    ]
                ])
            ->add('parking', ChoiceType::class,['label'=>'Parking ?',
                'choices'=>[
                    'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',
                ]
            ])
            ->add('restaurant', ChoiceType::class,['label'=>'Restauration possible ',

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',

                    ]
                ])
            ->add('picnic',ChoiceType::class,['label'=>'Pique nique possible',

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',

                    ]
                ])
            ->add('otheractivites', ChoiceType::class,['label'=>'Autres activités?',

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',
                    ]
                ])
            ->add('website',TextareaType::class, ['label'=>'Adresse du site'])
            ->add('access', ChoiceType::class,['label'=>'Accès',

                    'choices'=>[
                        'gratuit'=>'gratuit',
                        'payant'=>'payant'
                    ]
                ])
            ->add('age1', ChoiceType::class, ['label'=>'Cela convient pour un enfant de 0 à 3 ans?',
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non',
                ]
            ])
            ->add('age2', ChoiceType::class, ['label'=>'Cela convient pour un enfant de 3 à 6 ans?',
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non',
                ]
            ])
            ->add('age3', ChoiceType::class, ['label'=>'Cela convient pour un enfant de 6 à 10 ans?',
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non',
                ]
            ])
            ->add('age4', ChoiceType::class, ['label'=>'Cela convient pour un enfant de 10 et plus?',
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non',
                ]
            ])
            ->add('gallery', GalleryType::class, ['label'=>'Ajouter des photos'])
            ->add('envoyer', SubmitType::class)
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Area::class,
        ]);
    }
}
