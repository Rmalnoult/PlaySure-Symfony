<?php

namespace CC\PlaysureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CC\PlaysureBundle\Entity\BetRepository")
 */
class Bet
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
     * @var integer
     *
     * @ORM\Column(name="expertBetId", type="integer")
     */
    private $expertBetId;

    /**
     * @var integer
     *
     * @ORM\Column(name="gameId", type="integer")
     */
    private $gameId;

    /**
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;


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
     * Set expertId
     *
     * @param integer $expertId
     * @return Bet
     */
    public function setExpertId($expertId)
    {
        $this->expertId = $expertId;

        return $this;
    }

    /**
     * Get expertId
     *
     * @return integer 
     */
    public function getExpertId()
    {
        return $this->expertId;
    }

    /**
     * Set number
     *
     * @param float $number
     * @return Bet
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return float 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set gameId
     *
     * @param integer $gameId
     * @return Bet
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;

        return $this;
    }

    /**
     * Get gameId
     *
     * @return integer 
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Bet
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
     * Set expertBetId
     *
     * @param integer $expertBetId
     * @return Bet
     */
    public function setExpertBetId($expertBetId)
    {
        $this->expertBetId = $expertBetId;

        return $this;
    }

    /**
     * Get expertBetId
     *
     * @return integer 
     */
    public function getExpertBetId()
    {
        return $this->expertBetId;
    }
}
