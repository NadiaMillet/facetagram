<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="eleve")
* */
class Eleve
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

// ELEVES - LYCEE : l'entité Lycee est appelé par eleves > création d'un colonne lycée_id dans la table élève
    /**
     * Plusr eleves pour un lycée
     * @ORM\ManyToOne(targetEntity="App\Entity\Lycee", inversedBy="eleves")
     * @ORM\JoinColumn(name="lycee_id", referencedColumnName="id")
     */
    private $lycee;

// ELEVES - PROFS : élève appel 
    /**
    * @ORM\ManyToMany(targetEntity="App\Entity\Prof", inversedBy="eleves")
    * @ORM\JoinTable(name="profs_eleves")
    **/
    private $profs;

// ELEVES - MATIERES : N-N in casse la relation par la crétation d'une table. Entité matière appelé par eleves
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Matiere", inversedBy="eleves")
     * @ORM\JoinTable(name="eleves_matieres")
     */
    private $matieres;



    public function __construct() 
    {
        $this->profs = new ArrayCollection();
        $this->matieres = new ArrayCollection();
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
     * Get plusr eleves pour un lycée
     */ 
    public function getLycee()
    {
        return $this->lycee;
    }

    /**
     * Set plusr eleves pour un lycée
     *
     * @return  self
     */ 
    public function setLycee($lycee)
    {
        $this->lycee = $lycee;

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
     * Get the value of matieres
     */ 
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * Set the value of matieres
     *
     * @return  self
     */ 
    public function setMatieres($matieres)
    {
        $this->matieres = $matieres;

        return $this;
    }
}