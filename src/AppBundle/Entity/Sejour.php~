<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sejour
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Sejour
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_format", type="string", length=255)
     */
    private $titreFormat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sejour", type="datetime")
     */
    private $dateSejour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="visuel", type="string", length=255)
     */
    private $visuel;


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
     * Set titre
     *
     * @param string $titre
     * @return Sejour
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set titreFormat
     *
     * @param string $titreFormat
     * @return Sejour
     */
    public function setTitreFormat($titreFormat)
    {
        $this->titreFormat = $titreFormat;

        return $this;
    }

    /**
     * Get titreFormat
     *
     * @return string 
     */
    public function getTitreFormat()
    {
        return $this->titreFormat;
    }

    /**
     * Set dateSejour
     *
     * @param \DateTime $dateSejour
     * @return Sejour
     */
    public function setDateSejour($dateSejour)
    {
        $this->dateSejour = $dateSejour;

        return $this;
    }

    /**
     * Get dateSejour
     *
     * @return \DateTime 
     */
    public function getDateSejour()
    {
        return $this->dateSejour;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Sejour
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Sejour
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set tags
     *
     * @param string $tags
     * @return Sejour
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set visuel
     *
     * @param string $visuel
     * @return Sejour
     */
    public function setVisuel($visuel)
    {
        $this->visuel = $visuel;

        return $this;
    }

    /**
     * Get visuel
     *
     * @return string 
     */
    public function getVisuel()
    {
        return $this->visuel;
    }
}
