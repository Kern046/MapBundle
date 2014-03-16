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
}
