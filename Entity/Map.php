<?php

namespace Citadel\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Map
 *
 * @ORM\Table(name="map_bundle_map")
 * @ORM\Entity(repositoryClass="Citadel\MapBundle\Entity\MapRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Map
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "5",
     *      max = "60",
     *      minMessage = "Map's name must have more than {{ limit }} letters",
     *      maxMessage = "Map's name must have less than {{ limit }} letters"
     * )
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Assert\DateTime()
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     * @Assert\DateTime()
     */
    private $updatedAt;

    /**
     * @var float
     *
     * @ORM\Column(name="scale", type="float")
     * @Assert\Range(
     *      min = 0.1,
     *      max = 10.0,
     *      minMessage = "The scale must be greater than {{limit}} or equal.",
     *      maxMessage = "The scale must be less than {{limit}} or equal."
     * )
     */
    private $scale;

    /**
     *
     * @var type 
     * 
     * @ORM\OneToOne(targetEntity="Citadel\MapBundle\Entity\BaseImage", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()
     */
    private $baseImage;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToOne(targetEntity="Citadel\MapBundle\Entity\generatedImage", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid()
     */
    private $generatedImage;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToMany(targetEntity="Citadel\MapBundle\Entity\Area", mappedBy="map", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid()
     */
    private $areas;
    
    /**
     *
     * @var type 
     * 
     * @ORM\ManyToOne(targetEntity="Citadel\MapBundle\Entity\Map")
     * @ORM\JoinColumn(nullable=true)
     */
    private $parent;


    /**
     * @ORM\PrePersist()
     */
    public function prePersist(){
        
        $datetime = new \DateTime;
        
        $this->setCreatedAt($datetime);
        $this->setUpdatedAt($datetime);
        $this->setScale(1.0);
        
    }
    
    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate(){
        
        $this->setUpdatedAt(new \DateTime);
        
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
     * @return Map
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Map
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Map
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set scale
     *
     * @param float $scale
     * @return Map
     */
    public function setScale($scale)
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Get scale
     *
     * @return float 
     */
    public function getScale()
    {
        return $this->scale;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->areas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set baseImage
     *
     * @param \Citadel\MapBundle\Entity\BaseImage $baseImage
     * @return Map
     */
    public function setBaseImage(\Citadel\MapBundle\Entity\BaseImage $baseImage)
    {
        $this->baseImage = $baseImage;

        return $this;
    }

    /**
     * Get baseImage
     *
     * @return \Citadel\MapBundle\Entity\BaseImage 
     */
    public function getBaseImage()
    {
        return $this->baseImage;
    }

    /**
     * Set generatedImage
     *
     * @param \Citadel\MapBundle\Entity\generatedImage $generatedImage
     * @return Map
     */
    public function setGeneratedImage(\Citadel\MapBundle\Entity\generatedImage $generatedImage = null)
    {
        $this->generatedImage = $generatedImage;

        return $this;
    }

    /**
     * Get generatedImage
     *
     * @return \Citadel\MapBundle\Entity\generatedImage 
     */
    public function getGeneratedImage()
    {
        return $this->generatedImage;
    }

    /**
     * Add areas
     *
     * @param \Citadel\MapBundle\Entity\Area $areas
     * @return Map
     */
    public function addArea(\Citadel\MapBundle\Entity\Area $areas)
    {
        $this->areas[] = $areas;

        return $this;
    }

    /**
     * Remove areas
     *
     * @param \Citadel\MapBundle\Entity\Area $areas
     */
    public function removeArea(\Citadel\MapBundle\Entity\Area $areas)
    {
        $this->areas->removeElement($areas);
    }

    /**
     * Get areas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAreas()
    {
        return $this->areas;
    }

    /**
     * Set parent
     *
     * @param \Citadel\MapBundle\Entity\Map $parent
     * @return Map
     */
    public function setParent(\Citadel\MapBundle\Entity\Map $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Citadel\MapBundle\Entity\Map 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
