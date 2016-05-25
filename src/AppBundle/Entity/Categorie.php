<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="categorie")
     */
    private $questions;
     
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="categories")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
    */
    private $utilisateur;


    public function __construct()
    {
            $this->questions = new ArrayCollection();            
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * 
     * @return ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }
    
    /**
     * 
     * @param Utilisateur $utilisateur
     * @return Categorie
     */
    
    public function setUtilisateur($utilisateur){
        $this->utilisateur = $utilisateur;
        return $this;
    }
    /**
     * 
     * @return Utilisateur
     */
    public function getUtilisateur(){
        return $this->utilisateur;
    }
}
