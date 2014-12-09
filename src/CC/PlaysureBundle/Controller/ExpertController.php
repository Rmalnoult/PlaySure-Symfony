<?php

namespace CC\PlaysureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CC\PlaysureBundle\Entity\Game;
use CC\PlaysureBundle\Entity\GameRepository;
use CC\PlaysureBundle\Entity\ExpertBet;
use CC\PlaysureBundle\Entity\ExpertBetRepository;
use CC\PlaysureBundle\Entity\Expert;
use CC\PlaysureBundle\Entity\ExpertRepository;

class ExpertController extends Controller
{

 
    public function expertProfileAction($expertId)
    {
        
        $variablesToRender = array(

                );  

        return $this->render('CCPlaysureBundle:Expert:profile.html.twig', $variablesToRender);




        // $variablesToRender = array(
        //         'games' =>  $games,
        //         );  

        // return $this->render('CCPlaysureBundle:Home:index.html.twig', $variablesToRender);  
    }
}