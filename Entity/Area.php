<?php

namespace Citadel\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table(name="map_bundle_area")
 * @ORM\Entity(repositoryClass="Citadel\MapBundle\Entity\AreaRepository")
 */
class Area
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
     * @var array
     *
     * @ORM\Column(name="coordinates", type="array")
     */
    private $coordinates;

    /**
     *
     * @var type 
     * 
     * @ORM\ManyToOne(targetEntity="Citadel\MapBundle\Entity\Map", inversedBy="areas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $map;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToMany(targetEntity="Citadel\MapBundle\Entity\Statistics", mappedBy="area", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $statistics;
    
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
     * @return Area
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
     * Set coordinates
     *
     * @param array $coordinates
     * @return Area
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * Get coordinates
     *
     * @return array 
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->statistics = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set map
     *
     * @param \Citadel\MapBundle\Entity\Map $map
     * @return Area
     */
    public function setMap(\Citadel\MapBundle\Entity\Map $map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * Get map
     *
     * @return \Citadel\MapBundle\Entity\Map 
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Add statistics
     *
     * @param \Citadel\MapBundle\Entity\Statistics $statistics
     * @return Area
     */
    public function addStatistic(\Citadel\MapBundle\Entity\Statistics $statistics)
    {
        $this->statistics[] = $statistics;

        return $this;
    }

    /**
     * Remove statistics
     *
     * @param \Citadel\MapBundle\Entity\Statistics $statistics
     */
    public function removeStatistic(\Citadel\MapBundle\Entity\Statistics $statistics)
    {
        $this->statistics->removeElement($statistics);
    }

    /**
     * Get statistics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatistics()
    {
        return $this->statistics;
    }
}
