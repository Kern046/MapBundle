<?php

namespace Citadel\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistics
 *
 * @ORM\Table(name="map_bundle_statistics")
 * @ORM\Entity(repositoryClass="Citadel\MapBundle\Entity\StatisticsRepository")
 */
class Statistics
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
     * @var type 
     * 
     * @ORM\ManyToOne(targetEntity="Citadel\MapBundle\Entity\Area", inversedBy="statistics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $area;
    
    /**
     *
     * @var type 
     * 
     * @ORM\ManyToOne(targetEntity="Citadel\MapBundle\Entity\Theme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;
    
    /**
     *
     * @var type 
     * 
     * @ORM\OneToMany(targetEntity="Citadel\MapBundle\Entity\Value", mappedBy="statistics", cascade={"remove"})
     */
    private $values;

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
     * @return Statistics
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
        $this->values = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set area
     *
     * @param \Citadel\MapBundle\Entity\Area $area
     * @return Statistics
     */
    public function setArea(\Citadel\MapBundle\Entity\Area $area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \Citadel\MapBundle\Entity\Area 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set theme
     *
     * @param \Citadel\MapBundle\Entity\Theme $theme
     * @return Statistics
     */
    public function setTheme(\Citadel\MapBundle\Entity\Theme $theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \Citadel\MapBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Add values
     *
     * @param \Citadel\MapBundle\Entity\Value $values
     * @return Statistics
     */
    public function addValue(\Citadel\MapBundle\Entity\Value $values)
    {
        $this->values[] = $values;

        return $this;
    }

    /**
     * Remove values
     *
     * @param \Citadel\MapBundle\Entity\Value $values
     */
    public function removeValue(\Citadel\MapBundle\Entity\Value $values)
    {
        $this->values->removeElement($values);
    }

    /**
     * Get values
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getValues()
    {
        return $this->values;
    }
}
