<?php

namespace Citadel\MapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Value
 *
 * @ORM\Table(name="map_bundle_value")
 * @ORM\Entity(repositoryClass="Citadel\MapBundle\Entity\ValueRepository")
 */
class Value
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
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;

    /**
     *
     * @var type 
     * 
     * @ORM\ManyToOne(targetEntity="Citadel\MapBundle\Entity\Statistics", inversedBy="values")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statistics;

    /**
     *
     * @var type 
     * 
     * @ORM\OneToOne(targetEntity="Citadel\MapBundle\Entity\Unit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unit;
    
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
     * @return Value
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
     * Set value
     *
     * @param float $value
     * @return Value
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set statistics
     *
     * @param \Citadel\MapBundle\Entity\Statistics $statistics
     * @return Value
     */
    public function setStatistics(\Citadel\MapBundle\Entity\Statistics $statistics)
    {
        $this->statistics = $statistics;

        return $this;
    }

    /**
     * Get statistics
     *
     * @return \Citadel\MapBundle\Entity\Statistics 
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * Set unit
     *
     * @param \Citadel\MapBundle\Entity\Unit $unit
     * @return Value
     */
    public function setUnit(\Citadel\MapBundle\Entity\Unit $unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \Citadel\MapBundle\Entity\Unit 
     */
    public function getUnit()
    {
        return $this->unit;
    }
}
