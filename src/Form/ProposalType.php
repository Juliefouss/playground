<?php

namespace App\Form;

use App\Entity\Proposal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProposalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextareaType::class, ['label'=>"Votre nom"])
            ->add('firstname', TextareaType::class,['label'=>"Votre prénom"])
            ->add('namearea', TextareaType::class,['label'=>"Nom de l'aire"])
            ->add('adressarea', TextareaType::class,['label'=>"Adresse de l'aire"])
            ->add('postalarea', IntegerType::class,['label'=>"code postal"])
            ->add('ville', TextareaType::class,['label'=>"Ville"])
            ->add('description', TextareaType::class,['label'=>"Petite description"])
            ->add('pmr',ChoiceType::class,['label'=>"Accès PMR",

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',
                    ]
                ])
            ->add('parking', ChoiceType::class,['label'=>"Présence d'un parking",
                'choices'=>[
                    'Je ne sais pas'=> 'Pas communiqué',
                    'Oui'=>'oui',
                    'Non'=>'non',
                ]
            ])
            ->add('restaurant', ChoiceType::class,['label'=>"Restauration possible?",

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',
                    ]
                ])
            ->add('picnic',ChoiceType::class,['label'=>"Possibilité de pique-niquer?",

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',
                    ]
                ])
            ->add('otheractivites', ChoiceType::class,['label'=>"Autres activités possible?",

                    'choices'=>[
                        'Je ne sais pas'=> 'Pas communiqué',
                        'Oui'=>'oui',
                        'Non'=>'non',
                    ]
                ])
            ->add('website',UrlType::class,['label'=>"Site internet"])
            ->add('access', ChoiceType::class,['label'=>"Accès à la plaine de jeux",

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
            ->add('gallery', GalleryType::class,['label'=>"Photos"])
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Proposal::class,
        ]);
    }
}
