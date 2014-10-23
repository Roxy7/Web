<?php

namespace Roxanne7\VinnityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    
    public function welcomeAction()
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
