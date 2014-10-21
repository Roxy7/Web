<?php

namespace Roxanne7\UserBundle\Controller;

use Roxanne7\UserBundle\Entity\User;
use Roxanne7\UserBundle\Entity\Profile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserManagementController extends Controller
{

    public function registerAction()
    {
    	
    	return $this->render('Roxanne7UserBundle:Default:register.html.twig');
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
    
    public function addUser()
    {
    	$user = new User();
    	$user->setpseudo('Roxanne7_');
    	$user->setpass('1234');
    	//$user->setpass(password_hash('*77taru77*', PASSWORD_DEFAULT));
    	$user->setmail('roxanne7_@collectifembriagoun.com1');
    	$user->setcle(md5(microtime(TRUE)*100000));
    	
    	
    	$profile = new Profile();
    	$profile->setavatar('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
    	$profile->setsex('M');
    	
    	$user->setprofile($profile);
    	
    	// On récupère l'EntityManager
    	$em = $this->getDoctrine()->getManager();
    	
    	
    	// Étape 1 : On « persiste » l'entité
    	$em->persist($user);
    	
    	// Étape 2 : On « flush » tout ce qui a été persisté avant
    	$em->flush();
    	
    }
    
    public function getUser()
    {
    	
    	
    	//$repository = $this->getDoctrine()->getManager()->getRepository('Roxanne7UserBundle:User');
    	//$user = $this->$repository->find($id);
    	
    	return $user;
    }
}
