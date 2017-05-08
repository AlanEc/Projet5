<?php

namespace Swap\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('prenom', TextType::class)
        ->add('nom', TextType::class)
        ->add('email', TextType::class)
        ->add('nationalite', TextType::class)
        ->add('profession', TextType::class)
        ->add('description', TextType::class)
        ->add('save', SubmitType::class)
       ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Swap\PlatformBundle\Entity\Membre'
        ));
    }
}