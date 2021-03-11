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

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('lycee', EntityType::class, ['class' => Lycee::class,'choice_label' => 'lycee']) 
            ->add('profs', EntityType::class, ['class' => Prof::class, 'choice_label' => 'profs'])  
            ->add('matieres', EntityType::class, ['class' => Matiere::class, 'choice_label' => 'matieres'])  

            ->add('save', SubmitType::class, 
            [
                'attr' => ['class' => 'save'],
            ]);
            
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}