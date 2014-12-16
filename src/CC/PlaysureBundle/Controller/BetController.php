<?php

namespace CC\PlaysureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CC\PlaysureBundle\Entity\Game;
use CC\PlaysureBundle\Entity\GameRepository;
use CC\PlaysureBundle\Entity\ExpertBet;
use CC\PlaysureBundle\Entity\ExpertBetRepository;
use CC\PlaysureBundle\Entity\Bet;
use CC\PlaysureBundle\Entity\BetRepository;

class BetController extends Controller
{
    public function placeNewBetAction($gameId, $expertBetId)
    {
        $bet = new Bet();

        $user = $this->container->get('security.context')->getToken()->getUser();
        $userId = $user->getId();

        $bet->setGameId($gameId);
        $bet->setexpertBetId($expertBetId);
        $bet->setuserId($userId);

        $em = $this->getDoctrine()->getManager();

        $em->persist($bet);
        $em->flush();
        
        $betId = $bet->getId();


        $variablesToRender = array(
                'userId' =>  $userId,
                );  

        return $this->redirect($this->generateUrl('userBets', $variablesToRender));


    }
    public function displayUserBetsAction($userId)
    {
        $betRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Bet');
        $gameRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Game');
        $expertBetRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:ExpertBet');
        $expertRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Expert');
        // get expert

        $bets = $betRepository->getBetsByUserId($userId);

        foreach ($bets as $bet) {

            // get game 
            $betId = $bet->getId();
            $game = $gameRepository->getGame($bet->getGameId());

           $teamA = $game->getTeamA();
           $teamB = $game->getTeamB();

           $bet->teamA = $teamA;
           $bet->teamB = $teamB;            


           $expertBetId = $bet->getExpertBetId();
           $expertBet = $expertBetRepository->getExpertBet($expertBetId);

            $pronosticTeamA = $expertBet->getPronosticTeamA();
            $pronosticTeamB = $expertBet->getPronosticTeamB();

            $bet->pronosticTeamA = $pronosticTeamA;
            $bet->pronosticTeamB = $pronosticTeamB;     

            $expertId = $expertBet->getExpertId();
            $expert = $expertRepository->getExpert($expertId);


            $expertName = $expert->getName();
            $bet->expertName = $expertName;  

            $bet->expertBet = $expertBet;

        }


        $variablesToRender = array(
                'bets' =>  $bets,
                );   

        return $this->render('CCPlaysureBundle:Home:userBets.html.twig', $variablesToRender);
    }

}