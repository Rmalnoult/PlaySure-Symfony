<?php

namespace CC\PlaysureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CC\PlaysureBundle\Entity\Expert;
use CC\PlaysureBundle\Entity\ExpertRepository;
use CC\PlaysureBundle\Entity\ExpertBet;
use CC\PlaysureBundle\Entity\ExpertBetRepository;

class AdminController extends Controller
{

    public function indexAction()
    {
        return $this->render('CCPlaysureBundle:Home:index.html.twig');
    }

    public function createNewExpertAction()
    {
        $expert = new Expert();
        // doctrine's syntax to load the expert repo
        $postRepository = $this->getDoctrine()
            ->getRepository('CCPlaysureBundle:Expert');

        // create a form to choose a bet    
        $form = $this->createFormBuilder($expert)
            ->add('name', 'text', array('label' => ' Nom '))
            ->add('userId', 'number', array('label' => ' UserId '))
            ->add('save', 'submit', array('label' => ' OK '))
            ->getForm();

        // get the validated form and handle it
        $request = $this->getRequest();
        $form->handleRequest($request);
        // if form is valid
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            // flush to update the changes permanently in the database
            $em->persist($expert);
            $em->flush();

	 

			return $this->render('CCPlaysureBundle:Home:index.html.twig');
    	}

        return $this->render('CCPlaysureBundle:Admin:createNewExpert.html.twig', array(
            'form' => $form->createView(),
        ));
	}
    public function createNewExpertBetAction()
    {
        $expertBet = new ExpertBet();
        // doctrine's syntax to load the expert repo
        $postRepository = $this->getDoctrine()
            ->getRepository('CCPlaysureBundle:ExpertBet');

        // create a form to choose a bet    
        $form = $this->createFormBuilder($expertBet)
            ->add('gameId', 'number', array('label' => ' gameId '))
            ->add('expertId', 'number', array('label' => ' expertId '))
            ->add('expertName', 'text', array('label' => ' expertName '))
            ->add('userId', 'number', array('label' => ' userId '))
            ->add('number', 'number', array('label' => ' number '))
            ->add('numberOfActionsTotal', 'number', array('label' => ' numberOfActionsTotal '))
            ->add('numberOfActionsSold', 'number', array('label' => ' numberOfActionsSold '))
            ->add('priceOfAction', 'number', array('label' => ' priceOfAction ', 'required' => false))
            ->add('pronosticTeamA', 'number', array('label' => ' pronosticTeamA '))
            ->add('pronosticTeamB', 'number', array('label' => ' pronosticTeamB '))
            ->add('save', 'submit', array('label' => ' OK '))
            ->getForm();

        // get the validated form and handle it
        $request = $this->getRequest();
        $form->handleRequest($request);
        // if form is valid
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            // flush to update the changes permanently in the database
            $em->persist($expertBet);
            $em->flush();

     

            return $this->render('CCPlaysureBundle:Home:index.html.twig');
        }

        return $this->render('CCPlaysureBundle:Admin:createNewExpertBet.html.twig', array(
            'form' => $form->createView(),
        ));        
    }
    public function ajaxTestAction()
    {
      $request = $this->container->get('request');
      //handle data

      //prepare the response, e.g.
      $response = array("code" => 100, "success" => true);
      //you can return result as JSON
      return new Response(json_encode($response)); 
    }
}
