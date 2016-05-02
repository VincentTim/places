<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
    *
    * @ORM\ManyToMany(targetEntity="Travel", inversedBy="tags")
    **/
    private $travels;


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
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->travels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add travels
     *
     * @param \AppBundle\Entity\Travel $travels
     * @return Tag
     */
    public function addTravel(\AppBundle\Entity\Travel $travels)
    {
        $this->travels[] = $travels;

        return $this;
    }

    /**
     * Remove travels
     *
     * @param \AppBundle\Entity\Travel $travels
     */
    public function removeTravel(\AppBundle\Entity\Travel $travels)
    {
        $this->travels->removeElement($travels);
    }

    /**
     * Get travels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTravels()
    {
        return $this->travels;
    }
}
