<?php

namespace App\Search\admin;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchAdminType extends AbstractType

/* c'est le formulaire pour la berre de recherche de l'admin qui reprend seulement le keyword de l'entité Il doit étendre AbstractType*/
{

public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder
        ->add('keyword')
        ->add('submit', SubmitType::class);
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection'=> false,
            'data_class' => SearchAdmin::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}