<?php

namespace BSky\Bundle\SimplePageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PageFormType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body', 'richeditor')
            ->add('keywords')
            ->add('published_at');
    }
    
    public function getName()
    {
        return 'bsky_simplepage_page';
    }
}
