<?php

namespace CC\PlaysureBundle\Entity;

use Doctrine\ORM\EntityRepository;
use CC\PlaysureBundle\Entity\Game;
use CC\PlaysureBundle\Entity\GameRepository;

/**
 * GameRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameRepository extends EntityRepository
{

	public function getAllGames()
	{
		$gameRepository = $this->getEntityManager()->getRepository('CCPlaysureBundle:Game');
		$games = $gameRepository->findBy(array(), array('id'=>'desc'));
		return $games;
	}
}
