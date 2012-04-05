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
            ->add('body', 'richeditor', array(
                'attr' => array(
                    'required' => 0,
                    'data-rich-editor-active' => true,
                    'data-rich-editor-theme' => 'advanced'
                )
            ))
            ->add('keywords', 'textarea')
            ->add('priority')
            ->add('published_at')
            ->add('slug')
            ->add('slugAuto')
            ->add('fbTitle')
            ->add('fbTitleAuto')
            ->add('fbDescription')
            ->add('fbDescriptionAuto')
            ->add('fbType')
            ->add('fbImage')
            ->add('fbSiteName')
            ->add('fbAppId')
            ->add('fbAdmins')
            ->add('fbLocationLatitude')
            ->add('fbLocationLongitude')
            ->add('fbLocationStreetAddress')
            ->add('fbLocationLocality')
            ->add('fbLocationRegion')
            ->add('fbLocationPostalCode')
            ->add('fbLocationCountryName')
            ->add('fbEmail')
            ->add('fbPhoneNumber');
    }
    
    public function getName()
    {
        return 'bsky_simplepage_page';
    }
}
