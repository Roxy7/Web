<?php

namespace Roxanne7\VinnityBundle\Controller;

use Roxanne7\UserBundle\Entity\User;
use Roxanne7\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GlobalController extends Controller
{
    public function headerAction()
    {
        return $this->render('Roxanne7VinnityBundle:Design:header.html.twig');
    }
    
    public function footerAction()
    {
    	return $this->render('Roxanne7VinnityBundle:Design:footer.html.twig');
    }
    
    public function welcomeAction(Request $request)
    {
    	
    	
    	return $this->render('Roxanne7VinnityBundle:Design:welcome.html.twig');
     }
    
    public function translationAction($name)
    {
    	return $this->render('Roxanne7VinnityBundle:Design:translation.html.twig', array(
    			'name' => $name
    	));
    }
    
}
