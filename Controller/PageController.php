<?php

namespace BSky\Bundle\SimplePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BSky\Bundle\SimplePageBundle\Entity\Page;
use BSky\Bundle\SimplePageBundle\Form\Type\PageFormType;
use BSky\Bundle\SimplePageBundle\Form\Handler\PageFormHandler;
use BSky\Bundle\SimplePageBundle\Form\Model\PageGroup;
use BSky\Bundle\SimplePageBundle\Form\Type\PageGroupFormType;
use BSky\Bundle\SimplePageBundle\Form\Handler\PageGroupFormHandler;

class PageController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('BSkySimplePageBundle:Page');
        
        $paginator = $this->get('bsky_core.paginator')->paginate(
            $repository->findAllQuery(),
            $this->getRequest()->query->get('page', 1),
            (int) $this->get('bsky_parameter.parameter_manager')->getValue('items_per_page'), 
            5
        );
        
        $form = $this->createForm(new PageGroupFormType($this->get('translator')), new PageGroup());
        
        return $this->render('BSkySimplePageBundle:Page:index.html.twig', array(
            'paginator' => $paginator,
            'groupForm' => $form->createView()
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
    
    public function groupProcessAction()
    {
        $model = new PageGroup();
        $form = $this->createForm(new PageGroupFormType($this->get('translator')), $model);
        $formHandler = new PageGroupFormHandler(
            $this->get('request'),
            $this->get('doctrine.orm.default_entity_manager')
        );
        
        $process = $formHandler->process($form, $this->getRequest()->get('ids'));
        if ($process != false) {
            if ('delete' == $process) {
                $this->get('session')->setFlash('success', $this->get('translator')->trans(
                        'page.flash.success.group.delete', 
                        array(), 
                        'BSkySimplePageBundle')
                );
            } elseif ('publish' == $process) {
                $this->get('session')->setFlash('success', $this->get('translator')->trans(
                        'page.flash.success.group.publish', 
                        array(), 
                        'BSkySimplePageBundle')
                );
            }
        }

        return $this->redirect($this->generateUrl('bsky_simplepage_page_index'));
    }
}