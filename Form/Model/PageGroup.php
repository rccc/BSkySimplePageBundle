<?php

namespace BSky\Bundle\SimplePageBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PageGroup
{
    /**
     * @Assert\Choice(callback = "getActions")
     */
    public $action;
    
    public static function getActions()
    {
        return array(
            'none',
            'publish',
            'unpublish',
            'delete'
        );
    }
}
