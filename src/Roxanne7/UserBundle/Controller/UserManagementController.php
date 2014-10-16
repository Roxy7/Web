<?php

namespace Roxanne7\UserBundle\Controller;

use Roxanne7\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserManagementController extends Controller
{

    public function registerAction()
    {
    	$this->addUser();
    	return $this->render('Roxanne7UserBundle:Default:register.html.twig');
    }
    
    public function loginAction()
    {
    	$user = $this->getUser(1);
    	return $this->render('Roxanne7UserBundle:Default:login.html.twig',array('pseudo' => $user->getPseudo()));
    }
    
    public function addUser()
    {
    	$user = new User();
    	$user->setpseudo('Roxanne7_');
    	$user->setpass('*77taru77*');
    	//$user->setpass(password_hash('*77taru77*', PASSWORD_DEFAULT));
    	$user->setmail('roxanne7_@collectifembriagoun.com');
    	$user->setcle(md5(microtime(TRUE)*100000));
    	
    	
    	// On récupère l'EntityManager
    	$em = $this->getDoctrine()->getManager();
    	
    	// Étape 1 : On « persiste » l'entité
    	$em->persist($user);
    	
    	// Étape 2 : On « flush » tout ce qui a été persisté avant
    	$em->flush();
    	
    }
    
    public function getUser($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('Roxanne7UserBundle:User');
    	
    	$user = $repository->find($id);
    	
    	return $user;
    }
}
