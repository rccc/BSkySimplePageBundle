<?php
namespace BSky\Bundle\SimplePageBundle\Entity\Translation;

use Stof\DoctrineExtensionsBundle\Entity\AbstractTranslation;
use Doctrine\ORM\Mapping as ORM;

/**
 * BSky\Bundle\SimplePageBundle\Entity\PageTranslation
 * 
 * @ORM\Entity(repositoryClass="Gedmo\Translatable\Entity\Repository\TranslationRepository")
 * @ORM\Table(
 *          name="simplepage_translation",
 *          indexes={@ORM\index(name="translations_lookup_idx", columns={
 *                      "locale", "object_class", "foreign_key"
 *                  })},
 *          uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_idx", columns={
 *                      "locale", "object_class", "foreign_key", "field"
 *                  })}
 *           )
 */
class PageTranslation extends AbstractTranslation
{
}