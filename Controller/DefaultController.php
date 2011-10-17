<?php

namespace BSky\Bundle\SimplePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('BSkySimplePageBundle:Default:index.html.twig', array('name' => $name));
    }
}
