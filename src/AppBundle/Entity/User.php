<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    *
    * @ORM\OneToMany(targetEntity="Travel", mappedBy="user")
    **/
    private $travels;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add travels
     *
     * @param \AppBundle\Entity\Travel $travels
     * @return User
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
