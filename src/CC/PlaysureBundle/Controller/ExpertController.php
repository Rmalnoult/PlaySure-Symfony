<?php

namespace CC\PlaysureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CC\PlaysureBundle\Entity\Game;
use CC\PlaysureBundle\Entity\GameRepository;
use CC\PlaysureBundle\Entity\ExpertBet;
use CC\PlaysureBundle\Entity\ExpertBetRepository;
use CC\PlaysureBundle\Entity\Expert;
use CC\PlaysureBundle\Entity\ExpertRepository;
use CC\PlaysureBundle\Entity\PastBet;
use CC\PlaysureBundle\Entity\PastBetRepository;

class ExpertController extends Controller
{

 
    public function expertProfileAction($expertId)
    {
        



        // get expert name, expert games
        // put the name as a css class to display pic


        //display all games
        $expertRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Expert');
        // get expert
        $expert = $expertRepository->getExpert($expertId);

        $expertName = $expert->getName();

        // get this expert's bet
        $expertBetRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:ExpertBet');
        // get expertBets
        $expertBets = $expertBetRepository->getExpertBets($expertId);


        // get games for the expertBets

         $gameRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Game');
         // get games

         foreach ($expertBets as $expertBet) {
            $gameId = $expertBet->getGameId();
            $game = $gameRepository->getGame($gameId);

            $teamA = $game->getTeamA();
            $teamB = $game->getTeamB();

            $expertBet->teamA = $teamA;
            $expertBet->teamB = $teamB;            

         }
    


        $variablesToRender = array(
                'expertBets' =>  $expertBets,
                'expertName' =>  $expertName,
                'expert' =>  $expert,
                );   

        return $this->render('CCPlaysureBundle:Expert:profile.html.twig', $variablesToRender);




        // $variablesToRender = array(
        //         'games' =>  $games,
        //         );  

        // return $this->render('CCPlaysureBundle:Home:index.html.twig', $variablesToRender);  
    }







    public function pastBetAction($expertId)
    {
        



        // get expert name, expert games
        // put the name as a css class to display pic


        //display all games
        $expertRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Expert');
        // get expert
        $expert = $expertRepository->getExpert($expertId);

        $expertName = $expert->getName();

        // get this expert's bet
        $pastBetRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:PastBet');
        // get expertBets
        $pastBets = $pastBetRepository->getPastBets($expertId);


        // get games for the expertBets

         $gameRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Game');
         // get games

         foreach ($pastBets as $pastBet) {
            $gameId = $pastBet->getGameId();
            $game = $gameRepository->getGame($gameId);

            $teamA = $game->getTeamA();
            $teamB = $game->getTeamB();

            $pastBet->teamA = $teamA;
            $pastBet->teamB = $teamB;            

         }
    


        $variablesToRender = array(
                'pastBets' =>  $pastBets,
                'expertName' =>  $expertName,
                'expert' =>  $expert,
                );   

        return $this->render('CCPlaysureBundle:Expert:profile.html.twig', $variablesToRender);




        // $variablesToRender = array(
        //         'games' =>  $games,
        //         );  

        // return $this->render('CCPlaysureBundle:Home:index.html.twig', $variablesToRender);  
    }






    public function expertBetAction($gameId, $expertBetId)
    {
        
        $gameRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Game');
        $game = $gameRepository->getGame($gameId);
        // get this expert's bet
        $expertBetRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:ExpertBet');
        // get expertBets
        $expertBet = $expertBetRepository->getExpertBet($expertBetId);

        $expertId = $expertBet->getExpertId();

        //display all games
        $expertRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Expert');
        // get expert
        $expert = $expertRepository->getExpert($expertId);

        $expertName = $expert->getName();

        $pastBetRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:PastBet');
        // get expertBets
        $pastBets = $pastBetRepository->getPastBets($expertId);


         // get games

         foreach ($pastBets as $pastBet) {
            $gameId = $pastBet->getGameId();
            $game = $gameRepository->getGame($gameId);

            $teamA = $game->getTeamA();
            $teamB = $game->getTeamB();

            $pastBet->teamA = $teamA;
            $pastBet->teamB = $teamB;            

         }


        $variablesToRender = array(
                'expertBet' =>  $expertBet,
                'expertName' =>  $expertName,
                'pastBets' =>  $pastBets,
                'expert' =>  $expert,
                'game' => $game,
                );   

        return $this->render('CCPlaysureBundle:Expert:expertBet.html.twig', $variablesToRender);


    }
}