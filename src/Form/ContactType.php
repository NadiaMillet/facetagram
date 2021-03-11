<?php 
// src/Form/ContactForm.php
// Création de formulaire, les lignes de codes ci-dessous sont par défaut et à reprendre à chaque fois. Ce sont les ->add qui sont à adapter à notre BDD
namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('societe', TextType::class)
            ->add('description', TextareaType::class)
            ->add('job', TextType::class)
            ->add('email', EmailType::class)
            ->add('phone', TelType::class)
            ->add('message', TextareaType::class, ['label' => 'Votre message'])
            ->add('save', SubmitType::class, 
            [
                'attr' => ['class' => 'save'],
            ]);
            
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}