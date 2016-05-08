<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * File
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class File
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
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\File()
     */
    private $file;
    
    /**
    *
    * @ORM\ManyToOne(targetEntity="Travel", inversedBy="files")
    **/
    private $travel;

    //Upload
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'upload/media';
    }
    
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        
        // use the original file name here but you should
        // sanitize it at least to avoid any security issues
        
        $filename = sha1(uniqid(mt_rand(), true));
        $this->name = $filename.'.'.$this->getFile()->guessExtension();

        // move takes the target directory and then the
        // target filename to move to
        try {
            $this->getFile()->move(
                $this->getUploadRootDir(),
                $this->name
            );
            
        } catch(\Exception $e){
            var_dump($e);
        }
    
        // clean up the file property as you won't need it anymore
        $this->file = null;
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
     * Set name
     *
     * @param string $name
     * @return File
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
     * Set file
     *
     * @param string $file
     * @return File
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set travel
     *
     * @param \AppBundle\Entity\Travel $travel
     * @return File
     */
    public function setTravel(\AppBundle\Entity\Travel $travel = null)
    {
        $this->travel = $travel;

        return $this;
    }

    /**
     * Get travel
     *
     * @return \AppBundle\Entity\Travel 
     */
    public function getTravel()
    {
        return $this->travel;
    }
}
