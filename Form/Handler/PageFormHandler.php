<?php
namespace BSky\Bundle\SimplePageBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityManager;
use BSky\Bundle\SimplePageBundle\Util\Urlizer;

class PageFormHandler
{
    protected $request;
    protected $em;
    protected $security;
    
    
    public function __construct(Request $request, EntityManager $em, SecurityContext $security)
    {
        $this->request = $request;
        $this->em = $em;
        $this->security = $security;
        $this->repository = $em->getRepository('BSkySimplePageBundle:Page');
    }
    
    private function getUser()
    {
        return $this->security->getToken()->getUser();
    }
    
    public function processNew(Form $form)
    {
        if('POST' == $this->request->getMethod()) {
            $form->bindRequest($this->request);
            
            if($form->isValid()){
                $entity = $form->getData();
                $entity->setSlug($this->getSlug($entity));
                $this->em->persist($entity);
                $this->em->flush();
                
                return true;
            }
        }
        return false;
    }
    
    public function processEdit(Form $form)
    {
        if('POST' == $this->request->getMethod()) {
            $form->bindRequest($this->request);
            
            if($form->isValid()){
                $entity = $form->getData();
                $entity->setSlug($this->getSlug($entity));
                $this->em->persist($entity);
                $this->em->flush();
                
                return true;
            }
        }
        return false;
    }
    
    private function getSlug($page)
    {   
        $stringToSlug = $page->getSlugAuto() ? $page->getTitle() : $page->getSlug() ;
        
        $urlizer = new Urlizer();
        
        $slug = $urlizer->urlize($stringToSlug);
        
        $slugSimilary = $this->repository->findBySlugAndSimilary($slug);
        
        $slugExist = in_array($slug, $slugSimilary);
        $slugIsOnPage = (array_key_exists($page->getId(), $slugSimilary) && $slugSimilary[$page->getId()] == $slug)?true:false;
        
        if (empty($slugSimilary) || !$slugExist || $slugIsOnPage) {
            return $slug;
        }
        
        $i = 1;
        $slugTest = $slug . '-' . $i;
        
        while (in_array($slugTest, $slugSimilary)) {
            $i++;
            $slugTest = $slug . '-' . $i;
        }
        
        return $slugTest;
    }
}