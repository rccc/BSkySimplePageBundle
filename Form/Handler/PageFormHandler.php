<?php
namespace BSky\Bundle\SimplePageBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\ORM\EntityManager;

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
                $this->em->persist($entity);
                $this->em->flush();
                
                return true;
            }
        }
        return false;
    }
}