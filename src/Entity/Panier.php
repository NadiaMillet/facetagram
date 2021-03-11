<?php
// src/Entity/Panier.php
namespace App\Entity;
use App\Repository\SubcategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="panier")
* */
class Panier
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
     * 
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", mappedBy="panier")
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

   

}
