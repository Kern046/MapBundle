<?php

namespace Citadel\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Map
 *
 * @ORM\Table(name="map_bundle_map")
 * @ORM\Entity(repositoryClass="Citadel\MapBundle\Entity\MapRepository")
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

    /**
     * @var float
     *
     * @ORM\Column(name="scale", type="float")
     */
    private $scale;

    /**
     *
     * @var type 
     * 
     * @ORM\OneToOne(targetEntity="Citadel\MapBundle\Entity\BaseImage", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $baseImage;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToOne(targetEntity="Citadel\MapBundle\Entity\generatedImage", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $generatedImage;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToMany(targetEntity="Citadel\MapBundle\Entity\Area", mappedBy="map", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $areas;


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
}
