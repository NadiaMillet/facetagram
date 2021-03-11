<?php 

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Lycee;
use App\Entity\Prof;
use App\Entity\Matiere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('lycee', EntityType::class, ['class' => Lycee::class,'choice_label' => 'lycee']) 
            ->add('eleves', EntityType::class, ['class' => Eleve::class, 'choice_label' => 'eleves'])  
            ->add('matiere', EntityType::class, ['class' => Matiere::class, 'choice_label' => 'matiere'])  

            ->add('save', SubmitType::class, 
            [
                'attr' => ['class' => 'save'],
            ]);
            
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Prof::class,
        ]);
    }
}