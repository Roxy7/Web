<?php

namespace Roxanne7\UserBundle\Controller;

use Roxanne7\UserBundle\Entity\User;
use Roxanne7\UserBundle\Entity\Profile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserManagementController extends Controller
{

    public function registerAction(Request $request)
    {
    	$user = new User();
    	$formBuilder = $this->get('form.factory')->createBuilder('form', $user);
    	$formBuilder
	    	->add('pseudo',      'text')
	    	->add('pass',     'password')
	    	->add('mail',   'email')
	    	->add('wantMail',	'checkbox')
	    	->add('save',      'submit')
    	;
    	$form = $formBuilder->getForm();
    	
    	// On fait le lien Requête <-> Formulaire
    	// À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
    	$form->handleRequest($request);
    	
    	// On vérifie que les valeurs entrées sont correctes
    	// (Nous verrons la validation des objets en détail dans le prochain chapitre)
    	if ($form->isValid()) {
    		// On l'enregistre notre objet $advert dans la base de données, par exemple
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($user);
    		$em->flush();
    	
    		$request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
    	
    		// On redirige vers la page de visualisation de l'annonce nouvellement créée
    		return $this->redirect($this->generateUrl('Roxanne7_user_profile', array('userId' => $user->getId())));
    	}
    	
    	// On passe la méthode createView() du formulaire à la vue
    	// afin qu'elle puisse afficher le formulaire toute seule
    	return $this->render('Roxanne7UserBundle:Default:register.html.twig', array(
    			'form' => $form->createView(),
    			));
    }
    
    public function loginAction()
    {
    	//$user = $this->getUser(1);
    	//return $this->render('Roxanne7UserBundle:Default:login.html.twig',array('uid' => $uid));
    	return $this->render('Roxanne7UserBundle:Default:login.html.twig');
    }
    
    public function profileAction($userId)
    {
    	
    	$repository = $this->getDoctrine()->getManager()->getRepository('Roxanne7UserBundle:User')	;
    	$user = $repository->find($userId);
    	
    	return $this->render('Roxanne7UserBundle:Default:profile.html.twig',array('user' => $user));
    }


    public function getUser()
    {
    	
    	
    	//$repository = $this->getDoctrine()->getManager()->getRepository('Roxanne7UserBundle:User');
    	//$user = $this->$repository->find($id);
    	
    	return $user;
    }
}
