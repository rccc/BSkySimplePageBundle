<?php

namespace Rccc\Bundle\SimplePageBundle\Form\Type;

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
            ->add('seoKeywords', 'textarea')
            ->add('seoPriority')
            ->add('seoDescription', 'textarea')
            ->add('published_at')
            ->add('slug')
            ->add('slugAuto')
            ->add('fbTitle')
            ->add('fbTitleAuto')
            ->add('fbDescription')
            ->add('fbDescriptionAuto')
            ->add('fbType', 'choice', array(
                'required' => false,
                'preferred_choices' => array(
                    'article', 
                    'blog',
                    'website',
                    'author',
                    'company'
                ),
                'choices' => array(
                    'blog' => 'Blog',
                    'website' => 'Site Internet',
                    'article' => 'Article',
                    'activity' => 'Activité',
                    'sport' => 'Sport',
                    'bar' => 'Bar',
                    'company' => 'Entreprise',
                    'cafe' => 'Café',
                    'hotel' => 'Hotel',
                    'restaurant' => 'Restaurant',
                    'cause' => 'Cause',
                    'sports_league' => 'Ligue sportive',
                    'sports_team' => 'Equipe de sport',
                    'band' => 'Band',
                    'government' => 'Gouvernement',
                    'non_profit' => 'Non profit',
                    'school' => 'Ecole',
                    'university' => 'Université',
                    'actor' => 'Acteur',
                    'athlete' => 'Athlète',
                    'author' => 'Auteur',
                    'director' => 'Directeur',
                    'musician' => 'Musicien',
                    'politician' => 'Politicien',
                    'public_figure' => 'Personne publique',
                    'city' => 'Ville',
                    'country' => 'Pays',
                    'landmark' => 'Landmark',
                    'state_province' => 'Etat/Departement',
                    'album' => 'Album',
                    'book' => 'Livre',
                    'drink' => 'Boisson',
                    'food' => 'Nourriture',
                    'game' => 'Jeux',
                    'product' => 'Produit',
                    'song' => 'Musique',
                    'movie' => 'Vidéo/Film',
                    'tv_show' => 'Show Télévisé',
                )
            ))
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
