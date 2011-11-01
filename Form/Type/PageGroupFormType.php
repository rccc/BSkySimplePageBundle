<?php

namespace BSky\Bundle\SimplePageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;

class PageGroupFormType extends AbstractType
{
    public $translator;
    
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('action', 'choice', array(
            'choices'   => array(
                'none'   => '',
                'publish' => $this->translator->trans('page.index.form_group.publish', array(), 'BSkySimplePageBundle'),
                'delete' => $this->translator->trans('page.index.form_group.delete', array(), 'BSkySimplePageBundle')
            ),
            'multiple'  => false,
            'attr' => array('class' => 'medium')
        ));
    }
    
    public function getName()
    {
        return 'bsky_simplepage_page_group';
    }
}
