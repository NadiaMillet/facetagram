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

class MatiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('eleve', EntityType::class, ['class' => Eleve::class,'choice_label' => 'eleve']) 
            ->add('profs', EntityType::class, ['class' => Prof::class, 'choice_label' => 'profs'])  

            ->add('save', SubmitType::class, 
            [
                'attr' => ['class' => 'save'],
            ]);
            
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matiere::class,
        ]);
    }
}