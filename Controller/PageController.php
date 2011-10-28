<?php

namespace BSky\Bundle\SimplePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BSky\Bundle\SimplePageBundle\Entity\Page;
use BSky\Bundle\SimplePageBundle\Form\Type\PageFormType;
use BSky\Bundle\SimplePageBundle\Form\Handler\PageFormHandler;

class PageController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $repository = $this->getDoctrine()->getRepository('BSkySimplePageBundle:Page');
        $query = $repository->findAllQuery();
        
        $paginator = $this->get('bsky_core.paginator')->paginate(
            $query,
            $request->query->get('page', 1),
            (int) $this->get('bsky_parameter.parameter_manager')->getValue('items_per_page'), 
            5
        );
        
        return $this->render('BSkySimplePageBundle:Page:index.html.twig', array(
            'paginator' => $paginator
        ));
    }
    
    public function newAction()
    {
        $entity = new Page();
        $form = $this->createForm(new PageFormType(), $entity);
        $formHandler = new PageFormHandler(
            $this->get('request'),
            $this->get('doctrine.orm.default_entity_manager'),
            $this->get('security.context'),
            $this->get('bsky_core.language_manager')
        );
        
        if($formHandler->processNew($form)) {
            $this->get('session')->setFlash('success', $this->get('translator')->trans(
                    'page.flash.success.new', 
                    array('%page_title%' => $entity->getTitle()), 
                    'BSkySimplePageBundle')
            );
            if($this->getRequest()->get('save_and_add') != null) {
                return $this->redirect($this->generateUrl('bsky_simplepage_page_new'));
            }
            return $this->redirect($this->generateUrl('bsky_simplepage_page_index'));
        }
        
        return $this->render('BSkySimplePageBundle:Page:new.html.twig', array('form' => $form->createView()));
    }
    
    public function editAction($id, $lang)
    {
        $entity = $this->getDoctrine()->getRepository('BSkySimplePageBundle:Page')->findOneBy(array('id' => $id));
        
        // Languages
        $languages = $this->get('bsky_core.language_manager')->findAllActiveLanguages();
        $entity->setTranslatableLocale($lang);
        $this->getDoctrine()->getEntityManager()->refresh($entity);
        
        $form = $this->createForm(new PageFormType(), $entity);
        $formHandler = new PageFormHandler(
            $this->get('request'),
            $this->get('doctrine.orm.default_entity_manager'),
            $this->get('security.context'),
            $this->get('bsky_core.language_manager')
        );
        
        if($formHandler->processEdit($form, $lang)){
            $this->getDoctrine()->getEntityManager()->refresh($entity);
            $this->get('session')->setFlash('success', $this->get('translator')->trans(
                    'page.flash.success.edit', 
                    array('%page_title%' => $entity->getTitle()), 
                    'BSkySimplePageBundle')
            );
        }
        
        return $this->render('BSkySimplePageBundle:Page:edit.html.twig', array(
            'form' => $form->createView(),
            'entity' => $entity,
            'lang' => $lang,
            'languages' => $languages,
        ));
    }
    
    public function deleteAction($id)
    {
        $entity = $this->getDoctrine()->getRepository('BSkySimplePageBundle:Page')->findOneBy(array('id' => $id));
        
        $this->get('session')->setFlash('success', $this->get('translator')->trans(
            'page.flash.success.delete', 
            array('%page_title%' => $entity->getTitle()), 
            'BSkySimplePageBundle')
        );
        
        $this->getDoctrine()->getEntityManager()->remove($entity);
        $this->getDoctrine()->getEntityManager()->flush();

        return $this->redirect($this->generateUrl('bsky_simplepage_page_index'));
    }
}