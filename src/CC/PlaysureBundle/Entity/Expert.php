<?php

namespace CC\PlaysureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expert
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CC\PlaysureBundle\Entity\ExpertRepository")
 */
class Expert
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
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * @return Expert
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
     * Set userId
     *
     * @param integer $userId
     * @return Expert
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set description
     *
     * @param \varchar $description
     * @return Expert
     */
    public function setDescription(\varchar $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return \varchar 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
