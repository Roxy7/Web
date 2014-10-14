<?php

namespace Roxanne7\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserManagementController extends Controller
{

    public function registerAction()
    {
    	return $this->render('Roxanne7UserBundle:Default:register.html.twig');
    }
    
    public function loginAction()
    {
    	return $this->render('Roxanne7UserBundle:Default:login.html.twig');
    }
}
