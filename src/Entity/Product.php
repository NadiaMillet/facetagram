<?php
// src/Entity/Product.php
namespace App\Entity;
use App\Repository\SubcategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="product")
* */
class Product
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
    * @ORM\Column(type="integer")
    */
    private $price;

    /**
    * @ORM\Column(type="string")
    */
    private $category;

    /**
    * Les produits sont liées à un client
    * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="products")
    * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
    */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Panier", inversedBy="products")
     * @ORM\JoinTable(name="products_paniers")
     */
    private $paniers;

    public function __construct() {
        $this->paniers = new ArrayCollection();
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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

/**
     * Get the value of owner
     */ 
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

}