<?php
// src/Entity/Article.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="contact")
* */

class Contact
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

     /**
    * @ORM\Column(type="string")
    */   
    private $prenom;

    /**
    * @ORM\Column(type="string")
    */
    private $societe;

    /**
    * @ORM\Column(type="string")
    */
    private $description;

    /**
    * @ORM\Column(type="string")
    */
    private $job;

    /**
    * @ORM\Column(type="string")
    */
    private $email;

    /**
    * @ORM\Column(type="integer")
    */ 
    private $phone;

    /**
    * @ORM\Column(type="string")
    */
    private $message;

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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of societe
     */ 
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set the value of societe
     *
     * @return  self
     */ 
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get the value of job
     */ 
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set the value of job
     *
     * @return  self
     */ 
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}