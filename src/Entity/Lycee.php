<?php

namespace App\Entity;
use App\Repository\LyceeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="lycee")
* */
class Lycee
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

    /**
    * @ORM\Column(type="string")
    */
    private $ville;

// LYCEE - PROVISEUR
     /**
     * @ORM\OneToOne(targetEntity="App\Entity\Proviseur", mappedBy="lycee")
     * @ORM\JoinColumn(name="proviseur_id", referencedColumnName="id")
     */
    private $proviseur;

//LYCCE - PROFS
    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Prof", mappedBy="lycee")
    */
    private $profs;

// LYCEE - ELEVES : élève appel lycée
    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Eleve", mappedBy="lycee")
    */
    private $eleves;




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
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of proviseur
     */ 
    public function getProviseur()
    {
        return $this->proviseur;
    }

    /**
     * Set the value of proviseur
     *
     * @return  self
     */ 
    public function setProviseur($proviseur)
    {
        $this->proviseur = $proviseur;

        return $this;
    }

    /**
     * Get the value of profs
     */ 
    public function getProfs()
    {
        return $this->profs;
    }

    /**
     * Set the value of profs
     *
     * @return  self
     */ 
    public function setProfs($profs)
    {
        $this->profs = $profs;

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
}