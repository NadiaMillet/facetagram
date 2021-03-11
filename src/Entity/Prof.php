<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="prof")
* */
class Prof
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    private $id;
    
    /**
    * @ORM\Column(type="string")
    */
    private $nom;

//PROFS - LYCEE
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Lycee", inversedBy="profs")
    * @ORM\JoinColumn(name="lycee_id", referencedColumnName="id")
    */
    private $lycee;


//PROFS - ELEVES : l'entité eleve est appelée par prof
    /**
    * @ORM\ManyToMany(targetEntity="App\Entity\Eleve", mappedBy="prof")
    */
    private $eleves;

// PROFS - MATIERE : l'entité matiere est appelée par prof
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Matiere", inversedBy="profs")
    * @ORM\JoinColumn(name="matieres_id", referencedColumnName="id")
    */
    private $matiere;

    public function __construct()
    {
    $this->eleves = new ArrayCollection();
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of lycee
     */ 
    public function getLycee()
    {
        return $this->lycee;
    }

    /**
     * Set the value of lycee
     *
     * @return  self
     */ 
    public function setLycee($lycee)
    {
        $this->lycee = $lycee;

        return $this;
    }

    /**
     * Get the value of eleves
     */ 
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * Set the value of eleves
     *
     * @return  self
     */ 
    public function setEleves($eleves)
    {
        $this->eleves = $eleves;

        return $this;
    }


    /**
     * Get the value of matiere
     */ 
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set the value of matiere
     *
     * @return  self
     */ 
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }
}