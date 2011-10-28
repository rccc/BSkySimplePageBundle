<?php
namespace BSky\Bundle\SimplePageBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use BSky\Bundle\CoreBundle\Model\LanguageManagerInterface;
use Doctrine\ORM\EntityManager;

class PageFormHandler
{
    protected $request;
    protected $em;
    protected $security;
    protected $language_manager;
    
    public function __construct(Request $request, EntityManager $em, SecurityContext $security, LanguageManagerInterface $language_manager)
    {
        $this->request = $request;
        $this->em = $em;
        $this->security = $security;
        $this->language_manager = $language_manager;
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
                $language = $this->language_manager->getCurrentLanguage();
                $entity->setTranslatableLocale($language->getValue());
                $entity->setAuthor($this->getUser());
                $this->em->persist($entity);
                $this->em->flush();
                
                return true;
            }
        }
        return false;
    }
    
    public function processEdit(Form $form, $lang)
    {
        if('POST' == $this->request->getMethod()) {
            $form->bindRequest($this->request);
            
            if($form->isValid()){
                $entity = $form->getData();
                $entity->setTranslatableLocale($lang);
                $this->em->persist($entity);
                $this->em->flush();
                
                return true;
            }
        }
        return false;
    }
}