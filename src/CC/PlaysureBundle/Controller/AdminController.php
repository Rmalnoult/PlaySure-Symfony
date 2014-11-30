<?php

namespace CC\PlaysureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CC\PlaysureBundle\Entity\Expert;
use CC\PlaysureBundle\Entity\ExpertRepository;

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
}
