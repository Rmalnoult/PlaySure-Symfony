<?php

namespace CC\PlaysureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CC\PlaysureBundle\Entity\GameRepository")
 */
class Game
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
     * @ORM\Column(name="teamA", type="string", length=255)
     */
    private $teamA;

    /**
     * @var string
     *
     * @ORM\Column(name="teamB", type="string", length=255)
     */
    private $teamB;

    /**
     * @var integer
     *
     * @ORM\Column(name="coteA", type="integer")
     */
    private $coteA;

    /**
     * @var integer
     *
     * @ORM\Column(name="coteB", type="integer")
     */
    private $coteB;

    /**
     * @var integer
     *
     * @ORM\Column(name="coteNul", type="integer")
     */
    private $coteNul;

    /**
     * @var string
     *
     * @ORM\Column(name="startTime", type="string", length=255)
     */
    private $startTime;

    /**
     * @var string
     *
     * @ORM\Column(name="finishTime", type="string", length=255)
     */
    private $finishTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreA", type="integer")
     */
    private $scoreA;

    /**
     * @var integer
     *
     * @ORM\Column(name="scoreB", type="integer")
     */
    private $scoreB;

    /**
     * @var string
     *
     * @ORM\Column(name="currentTime", type="string", length=255)
     */
    private $currentTime;


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
     * Set teamA
     *
     * @param string $teamA
     * @return Game
     */
    public function setTeamA($teamA)
    {
        $this->teamA = $teamA;

        return $this;
    }

    /**
     * Get teamA
     *
     * @return string 
     */
    public function getTeamA()
    {
        return $this->teamA;
    }

    /**
     * Set teamB
     *
     * @param string $teamB
     * @return Game
     */
    public function setTeamB($teamB)
    {
        $this->teamB = $teamB;

        return $this;
    }

    /**
     * Get teamB
     *
     * @return string 
     */
    public function getTeamB()
    {
        return $this->teamB;
    }

    /**
     * Set coteA
     *
     * @param integer $coteA
     * @return Game
     */
    public function setCoteA($coteA)
    {
        $this->coteA = $coteA;

        return $this;
    }

    /**
     * Get coteA
     *
     * @return integer 
     */
    public function getCoteA()
    {
        return $this->coteA;
    }

    /**
     * Set coteB
     *
     * @param integer $coteB
     * @return Game
     */
    public function setCoteB($coteB)
    {
        $this->coteB = $coteB;

        return $this;
    }

    /**
     * Get coteB
     *
     * @return integer 
     */
    public function getCoteB()
    {
        return $this->coteB;
    }

    /**
     * Set coteNul
     *
     * @param integer $coteNul
     * @return Game
     */
    public function setCoteNul($coteNul)
    {
        $this->coteNul = $coteNul;

        return $this;
    }

    /**
     * Get coteNul
     *
     * @return integer 
     */
    public function getCoteNul()
    {
        return $this->coteNul;
    }

    /**
     * Set startTime
     *
     * @param string $startTime
     * @return Game
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return string 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set finishTime
     *
     * @param string $finishTime
     * @return Game
     */
    public function setFinishTime($finishTime)
    {
        $this->finishTime = $finishTime;

        return $this;
    }

    /**
     * Get finishTime
     *
     * @return string 
     */
    public function getFinishTime()
    {
        return $this->finishTime;
    }

    /**
     * Set scoreA
     *
     * @param integer $scoreA
     * @return Game
     */
    public function setScoreA($scoreA)
    {
        $this->scoreA = $scoreA;

        return $this;
    }

    /**
     * Get scoreA
     *
     * @return integer 
     */
    public function getScoreA()
    {
        return $this->scoreA;
    }

    /**
     * Set scoreB
     *
     * @param integer $scoreB
     * @return Game
     */
    public function setScoreB($scoreB)
    {
        $this->scoreB = $scoreB;

        return $this;
    }

    /**
     * Get scoreB
     *
     * @return integer 
     */
    public function getScoreB()
    {
        return $this->scoreB;
    }

    /**
     * Set currentTime
     *
     * @param string $currentTime
     * @return Game
     */
    public function setCurrentTime($currentTime)
    {
        $this->currentTime = $currentTime;

        return $this;
    }

    /**
     * Get currentTime
     *
     * @return string 
     */
    public function getCurrentTime()
    {
        return $this->currentTime;
    }
}
