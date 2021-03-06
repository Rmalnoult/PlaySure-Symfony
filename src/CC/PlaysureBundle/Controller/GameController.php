<?php

namespace CC\PlaysureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CC\PlaysureBundle\Entity\Game;
use CC\PlaysureBundle\Entity\GameRepository;
use CC\PlaysureBundle\Entity\ExpertBet;
use CC\PlaysureBundle\Entity\ExpertBetRepository;
use CC\PlaysureBundle\Entity\Expert;
use CC\PlaysureBundle\Entity\ExpertRepository;

class GameController extends Controller
{

    public function submitNewGameAction()
    {
        $game = new Game();
        // doctrine's syntax to load the game repo
        $postRepository = $this->getDoctrine()
            ->getRepository('CCPlaysureBundle:Game');

        // create a form to choose a bet    
        $form = $this->createFormBuilder($game)
            ->add('teamA', 'text', array('label' => ' Equipe A '))
            ->add('teamB', 'text', array('label' => ' Equipe B '))
            ->add('coteA', 'number', array('label' => ' Cote de lequipe A '))
            ->add('coteB', 'number', array('label' => ' Cote de lequipe B '))
            ->add('coteNul', 'number', array('label' => ' Cote du match nul '))
            ->add('startTime', 'text', array('label' => ' Heure de début '))
            ->add('finishTime', 'text', array('label' => ' Heure de fin '))
            ->add('currentTime', 'text', array('label' => ' Temps écoulé (pour les livebets, sinon mettre 00:00) '))
            ->add('scoreA', 'integer', array('label' => ' Score de lequipe A '))
            ->add('scoreB', 'integer', array('label' => ' Score de lequipe B '))
            ->add('save', 'submit', array('label' => ' OK '))
            ->getForm();

        // get the validated form and handle it
        $request = $this->getRequest();
        $form->handleRequest($request);
        // if form is valid
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            // flush to update the changes permanently in the database
            $em->persist($game);
            $em->flush();

	    	//display all posts
	    	$postRepository = $this->getDoctrine()
	    	    ->getRepository('CCPlaysureBundle:Game');
			$games = $postRepository->findBy(array(), array('id'=>'desc'));
	        $variablesToRender = array(
	                'games' =>  $games,
	                );	

			return $this->render('CCPlaysureBundle:Home:index.html.twig', $variablesToRender);
    	}

        return $this->render('CCPlaysureBundle:Admin:submitNewGame.html.twig', array(
            'form' => $form->createView(),
        ));
	}


    public function gameViewAction($gameId)
    {
        

        // get the current game
        $game = $this->getDoctrine()
            ->getRepository('CCPlaysureBundle:Game')
            ->find($gameId);

        $expertBets = $this->getDoctrine()
            ->getRepository('CCPlaysureBundle:ExpertBet')
            ->findByGameId($gameId);

        $expertRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Expert');

        foreach ($expertBets as $expertBet) {
            $expertId = $expertBet->getExpertId();
            // get expert
            $expert = $expertRepository->getExpert($expertId);

            $expertName = $expert->getName();

           $expertBet->expertname = $expertName;
            
        }

        $variablesToRender = array(
                'game' =>  $game,
                'expertBets' =>  $expertBets,
                );  

        return $this->render('CCPlaysureBundle:Game:game.html.twig', $variablesToRender);




        // $variablesToRender = array(
        //         'games' =>  $games,
        //         );  

        // return $this->render('CCPlaysureBundle:Home:index.html.twig', $variablesToRender);  
    }
}