<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
* @ORM\Entity()
* @ORM\Table(name="matiere")
* */

class Matiere
{
   /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;

    /**
    * @ORM\Column(type="string")
    */
    private $nom;

// MATIERE - PROFs
    /**
     * Une matiere a potentiellement plusieurs professeur
     * @ORM\OneToMany(targetEntity="App\Entity\Prof", mappedBy="matiere")
     */
    private $profs;


// MATIERES - ELEVES : Eleve appel matiere
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve", mappedBy="matiere")
     */
    private $eleve;


    public function __construct()
    {
    $this->profs = new ArrayCollection();
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
     * Get the value of eleve
     */ 
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Set the value of eleve
     *
     * @return  self
     */ 
    public function setEleve($eleve)
    {
        $this->eleve = $eleve;

        return $this;
    }


    /**
     * Get une matiere a potentiellement plusieurs professeur
     */ 
    public function getProfs()
    {
        return $this->profs;
    }

    /**
     * Set une matiere a potentiellement plusieurs professeur
     *
     * @return  self
     */ 
    public function setProfs($profs)
    {
        $this->profs = $profs;

        return $this;
    }
}