<?php
namespace BSky\Bundle\SimplePageBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class PageGroupFormHandler
{
    protected $request;
    protected $em;
    
    public function __construct(Request $request, EntityManager $em)
    {
        $this->request = $request;
        $this->em = $em;
    }
    
    public function process(Form $form, $ids)
    {
        if('POST' == $this->request->getMethod()) {
            $form->bindRequest($this->request);
            
            if (!is_array($ids) || count($ids) <= 0)
                return false;
            
            if($form->isValid()){
                $data = $form->getData();
                
                $ids_filtered = array();
                foreach($ids as $id) {
                    $test = (int) $id;
                    if(is_int($test))
                        array_push($ids_filtered, $test);
                }
                
                $repository = $this->em->getRepository('BSkySimplePageBundle:Page');
                if ($data->action == 'delete') {
                    $repository->deleteGroup($ids_filtered);
                    return 'delete';
                } elseif ($data->action == 'publish') {
                    $repository->publishGroup($ids_filtered);
                    return 'publish';
                }
            }
        }
        return false;
    }
}