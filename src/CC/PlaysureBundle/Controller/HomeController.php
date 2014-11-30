<?php

namespace CC\PlaysureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function helloAction($name)
    {
        return $this->render('CCPlaysureBundle:Home:hello.html.twig', array('name' => $name));
    }
    public function indexAction()
    {

    	//display all games
    	$gameRepository = $this->getDoctrine()->getRepository('CCPlaysureBundle:Game');
		$games = $gameRepository->getAllGames();
        $variablesToRender = array(
                'games' =>  $games,
                );	

        return $this->render('CCPlaysureBundle:Home:index.html.twig', $variablesToRender);
    }
}
