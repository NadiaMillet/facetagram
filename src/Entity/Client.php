<?php
// src/Entity/Client.php
namespace App\Entity;
use App\Repository\SubcategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="client")
* */
class Client
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
    private $name;

     /**
     * Il y a un seul panier possible par client
     * @ORM\OneToOne(targetEntity="App\Entity\Panier")
     * @ORM\JoinColumn(name="panier_id", referencedColumnName="id")
     */
    private $panier;

    /**
     * Un client a potentiellement plusieurs produits
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="client")
     */
    private $products;

    public function __construct() {
        $this->products = new ArrayCollection();
    }

  
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

   


    /**
     * Get il y a un seul panier possible par client
     */ 
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Set il y a un seul panier possible par client
     *
     * @return  self
     */ 
    public function setPanier($panier)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get un client a potentiellement plusieurs produits
     */ 
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set un client a potentiellement plusieurs produits
     *
     * @return  self
     */ 
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }
}
