<?php

namespace BSky\Bundle\SimplePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BSky\Bundle\SimplePageBundle\Entity\Page;
use BSky\Bundle\SimplePageBundle\Form\Type\PageFormType;
use BSky\Bundle\SimplePageBundle\Form\Handler\PageFormHandler;

class FrontPageController extends Controller
{
    public function showAction($slug)
    {
        $repository = $this->getDoctrine()->getRepository('BSkySimplePageBundle:Page');
        $entity = $repository->findOneBy(array('slug' => $slug));
        
        return $this->render('BSkySimplePageBundle:FrontPage:show.html.twig', array(
            'entity' => $entity
        ));
    }
}