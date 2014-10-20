<?php

namespace Rccc\Bundle\SimplePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\NoResultException;

use Rccc\Bundle\SimplePageBundle\Entity\Page;
use Rccc\Bundle\SimplePageBundle\Form\Type\PageFormType;
use Rccc\Bundle\SimplePageBundle\Form\Handler\PageFormHandler;

class FrontPageController extends Controller
{
    public function showAction($slug)
    {
        $repository = $this->getDoctrine()->getRepository('RcccSimplePageBundle:Page');
        
        $query = $repository->createQueryBuilder('p')
            ->where('p.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery();
        
        // @todo 404 if post doesn't exist
        try {
            $entity = $query->getSingleResult();
        } catch (NoResultException $e) {
            throw $this->createNotFoundException();
        }

        return $this->render('RcccSimplePageBundle:FrontPage:show.html.twig', array(
            'entity' => $entity
        ));
    }
}