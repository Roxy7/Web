<?php

namespace Roxanne7\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Roxanne7UserBundle:Default:index.html.twig', array('name' => $name));
    }
}
