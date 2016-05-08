<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validation\Constraints AS Assert;

/**
 * Travel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Travel
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
     * @var date
     *
     * @ORM\Column(name="period_from", type="string", length=10)
     */
    private $period_from;

    /**
     * @var date
     *
     * @ORM\Column(name="period_to", type="date", type="string", length=10)
     */
    private $period_to;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=255)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
    *
    * @ORM\ManyToOne(targetEntity="User", inversedBy="travels")
    **/
    private $user;

    /**
    *
    * @ORM\ManyToMany(targetEntity="Tag", mappedBy="travels", cascade={"persist", "remove"})
    **/
    private $tags;
    
    /**
    *
    * @ORM\OneToMany(targetEntity="File", mappedBy="travel", cascade={"persist", "remove"})
    **/
    private $files;

    /**
    *
    * @ORM\ManyToOne(targetEntity="Country", inversedBy="travels")
    **/
    private $country;


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
     * @return Travel
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
     * Set period_from
     *
     * @param \DateTime $periodFrom
     * @return Travel
     */
    public function setPeriodFrom($periodFrom)
    {
        $this->period_from = $periodFrom;

        return $this;
    }

    /**
     * Get period_from
     *
     * @return \DateTime 
     */
    public function getPeriodFrom()
    {
        return $this->period_from;
    }

    /**
     * Set period_to
     *
     * @param \DateTime $periodTo
     * @return Travel
     */
    public function setPeriodTo($periodTo)
    {
        $this->period_to = $periodTo;

        return $this;
    }

    /**
     * Get period_to
     *
     * @return \DateTime 
     */
    public function getPeriodTo()
    {
        return $this->period_to;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Travel
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Travel
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Travel
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Travel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Travel
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tags
     *
     * @param \AppBundle\Entity\Tag $tags
     * @return Travel
     */
    public function addTag(\AppBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \AppBundle\Entity\Tag $tags
     */
    public function removeTag(\AppBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Country $country
     * @return Travel
     */
    public function setCountry(\AppBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add files
     *
     * @param \AppBundle\Entity\File $files
     * @return Travel
     */
    public function addFile(\AppBundle\Entity\File $files)
    {
        $this->files[] = $files;

        return $this;
    }

    /**
     * Remove files
     *
     * @param \AppBundle\Entity\File $files
     */
    public function removeFile(\AppBundle\Entity\File $files)
    {
        $this->files->removeElement($files);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiles()
    {
        return $this->files;
    }
}
