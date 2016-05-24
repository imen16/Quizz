<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="nomQuestion", type="string", length=255)
     */
    private $nomQuestion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="questions")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    private $categorie;
    
    /**
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="question")
     */
    private $reponses;
   
    public function __construct()
    {
            $this->reponses = new ArrayCollection();            
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
     * Set nomQuestion
     *
     * @param string $nomQuestion
     * @return Question
     */
    public function setNomQuestion($nomQuestion)
    {
        $this->nomQuestion = $nomQuestion;

        return $this;
    }

    /**
     * Get nomQuestion
     *
     * @return string 
     */
    public function getNomQuestion()
    {
        return $this->nomQuestion;
    }
    
    /**
     * Set categorie
     *
     * @param string $categorie
     * @return Question
     */
    public function setCategorie($nomQuestion)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    
    /**
     * 
     * @return ArrayCollection
     */
    public function getReponses()
    {
        return $this->reponses;
    }
}
