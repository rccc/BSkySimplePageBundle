<?php

namespace Rccc\Bundle\SimplePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Rccc\Bundle\SimplePageBundle\Entity\Page;
use Rccc\Bundle\SimplePageBundle\Form\Type\PageFormType;
use Rccc\Bundle\SimplePageBundle\Form\Handler\PageFormHandler;
use Rccc\Bundle\SimplePageBundle\Form\Model\PageGroup;
use Rccc\Bundle\SimplePageBundle\Form\Type\PageGroupFormType;
use Rccc\Bundle\SimplePageBundle\Form\Handler\PageGroupFormHandler;

class PageController extends Controller
{
    // public function indexAction()
    // {
    //     $repository = $this->getDoctrine()->getRepository('RcccSimplePageBundle:Page');
        
    //     $paginator = $this->get('bsky_core.paginator')->paginate(
    //         $repository->findAllQuery(),
    //         $this->getRequest()->query->get('page', 1),
    //         (int) $this->get('bsky_parameter.parameter_manager')->getValue('items_per_page'), 
    //         5
    //     );
        
    //     $form = $this->createForm(new PageGroupFormType($this->get('translator')), new PageGroup());
        
    //     return $this->render('BSkySimplePageBundle:Page:index.html.twig', array(
    //         'paginator' => $paginator,
    //         'groupForm' => $form->createView()
    //     ));
    // }
    
    // public function newAction()
    // {
    //     $entity = new Page();
    //     $form = $this->createForm(new PageFormType(), $entity);
    //     $formHandler = new PageFormHandler(
    //         $this->get('request'),
    //         $this->get('doctrine.orm.default_entity_manager'),
    //         $this->get('security.context')
    //     );
        
    //     if($formHandler->processNew($form)) {
    //         $this->get('session')->setFlash('success', $this->get('translator')->trans(
    //                 'page.flash.success.new', 
    //                 array('%page_title%' => $entity->getTitle()), 
    //                 'BSkySimplePageBundle')
    //         );
    //         if($this->getRequest()->get('save_and_add') != null) {
    //             return $this->redirect($this->generateUrl('bsky_simplepage_page_new'));
    //         }
    //         return $this->redirect($this->generateUrl('bsky_simplepage_page_index'));
    //     }
        
    //     return $this->render('BSkySimplePageBundle:Page:new.html.twig', array('form' => $form->createView()));
    // }
    
    // public function editAction($id)
    // {
    //     $entity = $this->getDoctrine()->getRepository('BSkySimplePageBundle:Page')->findOneBy(array('id' => $id));
        
    //     $form = $this->createForm(new PageFormType(), $entity);
    //     $formHandler = new PageFormHandler(
    //         $this->get('request'),
    //         $this->get('doctrine.orm.default_entity_manager'),
    //         $this->get('security.context')
    //     );
        
    //     if($formHandler->processEdit($form)){
    //         $this->get('session')->setFlash('success', $this->get('translator')->trans(
    //                 'page.flash.success.edit', 
    //                 array('%page_title%' => $entity->getTitle()), 
    //                 'BSkySimplePageBundle')
    //         );
    //         return $this->redirect($this->generateUrl('bsky_simplepage_page_edit', array('id' => $entity->getId())));
    //     }
        
    //     return $this->render('BSkySimplePageBundle:Page:edit.html.twig', array(
    //         'form' => $form->createView(),
    //         'entity' => $entity
    //     ));
    // }
    
    // public function deleteAction($id)
    // {
    //     $entity = $this->getDoctrine()->getRepository('BSkySimplePageBundle:Page')->findOneBy(array('id' => $id));
        
    //     $this->get('session')->setFlash('success', $this->get('translator')->trans(
    //         'page.flash.success.delete', 
    //         array('%page_title%' => $entity->getTitle()), 
    //         'BSkySimplePageBundle')
    //     );
        
    //     $this->getDoctrine()->getEntityManager()->remove($entity);
    //     $this->getDoctrine()->getEntityManager()->flush();

    //     return $this->redirect($this->generateUrl('bsky_simplepage_page_index'));
    // }
    
    // public function groupProcessAction()
    // {
    //     $model = new PageGroup();
    //     $form = $this->createForm(new PageGroupFormType($this->get('translator')), $model);
    //     $formHandler = new PageGroupFormHandler(
    //         $this->get('request'),
    //         $this->get('doctrine.orm.default_entity_manager')
    //     );
        
    //     $process = $formHandler->process($form, $this->getRequest()->get('ids'));
    //     if ($process != false) {
    //         $this->get('session')->setFlash('success', $this->get('translator')->trans(
    //             'page.flash.success.group.' . $process, 
    //             array(), 
    //             'BSkySimplePageBundle')
    //         );
    //     }

    //     return $this->redirect($this->generateUrl('bsky_simplepage_page_index'));
    // }
}