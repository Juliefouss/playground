<?php

namespace App\Search\SearchUser;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchUserType extends AbstractType

{
    /* Le formulaire pour le moteur de recherches du moteur de recherche en reprenant toutes les paramètres choisis dans l'entité SearchUser*/

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextareaType::class, [/* je peux mettre le choix dans un tableau en donnant plusieurs paramètres */
                'label'=> false,
                'required'=> false,
                'attr'=> [
                    'placeholder'=> 'Nom'
                ]
            ])

            ->add('ville',TextareaType::class, [
                'label'=> false,
                'required'=> false,
                'attr'=> [
                    'placeholder'=> 'ville'
                ]
            ])
            ->add('postalcode', IntegerType::class,[
                'label'=>' Code postal',
                'required'=>false])

            ->add('baby',ChoiceType::class, [
                'label'=> 'Convient pour un enfant de 0-3 ans?',
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non'],

            ])
            ->add('mini',ChoiceType::class, [
                'label'=> false,
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non'],
                'attr'=> [
                    'placeholder'=> 'Convient pour un enfant de 0-3 ans?'
                ]
            ])
            ->add('child',ChoiceType::class, [
                'label'=> false,
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non'],
                'attr'=> [
                    'placeholder'=> 'Convient pour un enfant de 0-3 ans?'
                ]
            ])
            ->add('junior',ChoiceType::class, [
                'label'=> false,
                'choices'=>[
                    'oui'=>'oui',
                    'non'=>'non'],
                'attr'=> [
                    'placeholder'=> 'Convient pour un enfant de 0-3 ans?'
                ]
            ])

            ->add('Submit', SubmitType::class, ['label'=> 'Envoyer']);
    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection'=> false,
            'data_class' => SearchUser::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}