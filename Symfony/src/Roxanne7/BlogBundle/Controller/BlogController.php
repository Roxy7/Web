<?php

// src/Roxanne7/BlogBundle/Controller/BlogController.php
namespace Roxanne7\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller {
	public function indexAction() {
		return new Response ( "Hello World !" );
	}
  public function voirAction($id)
  {
  	// On utilise le raccourci : il crée un objet Response
  	// Et lui donne comme contenu le contenu du template
  	return $this->render('Roxanne7Bundle:Blog:voir.html.twig', array(
  			'id'  => $id,
  	));
  }
}

?>
  