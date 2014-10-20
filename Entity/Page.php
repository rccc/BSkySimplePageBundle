<?php

namespace Rccc\Bundle\SimplePageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * BSky\Bundle\SimplePageBundle\Entity\Page
 *
 * @ORM\Table(name="simplepage")
 * @ORM\Entity(repositoryClass="BSky\Bundle\SimplePageBundle\Entity\Repository\PageRepository")
 */
class Page
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $title
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\MaxLength(255)
     * @Assert\NotBlank()
     */
    protected $title;
    
    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    protected $slug;
    
    /**
     * @var string $slugAuto
     *
     * @ORM\Column(name="slug_auto", type="boolean", nullable="true")
     */
    protected $slugAuto = true;
    
    /**
     * @var string $body
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    protected $body;
    
    /**
     * @var string $keywords
     *
     * @ORM\Column(name="seo_keywords", type="text", nullable=true)
     * @Assert\MaxLength(500)
     */
    protected $seoKeywords;
    
    /**
     * @var string $seoDescription
     *
     * @ORM\Column(name="seo_description", type="text", nullable=true)
     * @Assert\MaxLength(800)
     */
    protected $seoDescription;
    
    /**
     * @var string $seoPriority
     *
     * @ORM\Column(name="seo_priority", type="integer", nullable=true)
     * @Assert\Max(limit=10)
     * @Assert\Min(limit=1)
     */
    protected $seoPriority;
    
    /**
     * @var string $fbTitle
     *
     * @ORM\Column(name="fb_title", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbTitle;
    
    /**
     * @var string $fbTitleAuto
     *
     * @ORM\Column(name="fb_title_auto", type="boolean", nullable=true)
     */
    protected $fbTitleAuto = true;
    
    /**
     * @var string $fbDescription
     *
     * @ORM\Column(name="fb_description", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbDescription;
    
    /**
     * @var string $fbDescriptionAuto
     *
     * @ORM\Column(name="fb_description_auto", type="boolean", nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbDescriptionAuto = true;
    
    /**
     * @var string $fbType
     *
     * @ORM\Column(name="fb_type", type="string", length=255, nullable=true)
     */
    protected $fbType;
    
    /**
     * @var string $fbImage
     *
     * @ORM\Column(name="fb_image", type="string", length=500, nullable=true)
     * @Assert\MaxLength(500)
     */
    protected $fbImage;
    
    /**
     * @var string $fbSiteName
     *
     * @ORM\Column(name="fb_site_name", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbSiteName;
    
    /**
     * @var string $fbAdmins
     *
     * @ORM\Column(name="fb_admins", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbAdmins;
    
    /**
     * @var string $fbAppId
     *
     * @ORM\Column(name="fb_app_id", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbAppId;
    
    /**
     * @var string $fbLocationLatitude
     *
     * @ORM\Column(name="fb_location_latitude", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbLocationLatitude;
    
    /**
     * @var string $fbLocationLongitude
     *
     * @ORM\Column(name="fb_location_longitude", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbLocationLongitude;
    
    /**
     * @var string $fbLocationStreetAddress
     *
     * @ORM\Column(name="fb_location_street_address", type="string", length=500, nullable=true)
     * @Assert\MaxLength(500)
     */
    protected $fbLocationStreetAddress;
    
    /**
     * @var string $fbLocationLocality
     *
     * @ORM\Column(name="fb_location_locality", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbLocationLocality;
    
    /**
     * @var string $fbLocationRegion
     *
     * @ORM\Column(name="fb_location_region", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbLocationRegion;
    
    /**
     * @var string $fbLocationPostalCode
     *
     * @ORM\Column(name="fb_location_postal_code", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbLocationPostalCode;
    
    /**
     * @var string $fbLocationCountryName
     *
     * @ORM\Column(name="fb_location_country_name", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbLocationCountryName;
    
    /**
     * @var string $fbEmail
     *
     * @ORM\Column(name="fb_email", type="string", length=255, nullable=true)
     * @Assert\MaxLength(255)
     */
    protected $fbEmail;
    
    /**
     * @var string $fbPhoneNumber
     *
     * @ORM\Column(name="fb_phone_number", type="string", length=25, nullable=true)
     * @Assert\MaxLength(25)
     */
    protected $fbPhoneNumber;

    /**
     * @var datetime $published_at
     *
     * @ORM\Column(name="published_at", type="datetime", nullable="true")
     */
    protected $published_at;
    
    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $created_at;
    
    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable="true")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated_at;

    public function __construct()
    {
        $this->published_at = new \DateTime('now');
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * Set slugAuto
     *
     * @param string $slugAuto
     */
    public function setSlugAuto($slugAuto)
    {
        $this->slugAuto = $slugAuto;
    }

    /**
     * Get slugAuto
     *
     * @return string 
     */
    public function getSlugAuto()
    {
        return $this->slugAuto;
    }

    /**
     * Set body
     *
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get body
     *
     * @return text 
     */
    public function getBody()
    {
        return $this->body;
    }

    public function getSeoKeywords()
    {
        return $this->seoKeywords;
    }

    public function setSeoKeywords($seoKeywords)
    {
        $this->seoKeywords = $seoKeywords;
    }

    public function getSeoDescription()
    {
        return $this->seoDescription;
    }

    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;
    }

    public function getSeoPriority()
    {
        return $this->seoPriority;
    }

    public function setSeoPriority($seoPriority)
    {
        $this->seoPriority = $seoPriority;
    }
            
    public function getFbTitle()
    {
        if ($this->getFbTitleAuto()) {
            return $this->getTitle();
        }
        
        return $this->fbTitle;
    }

    public function setFbTitle($fbTitle)
    {
        $this->fbTitle = $fbTitle;
    }

    public function getFbTitleAuto()
    {
        return $this->fbTitleAuto;
    }

    public function setFbTitleAuto($fbTitleAuto)
    {
        $this->fbTitleAuto = $fbTitleAuto;
    }

    public function getFbType()
    {
        return $this->fbType;
    }

    public function setFbType($fbType)
    {
        $this->fbType = $fbType;
    }

    public function getFbImage()
    {
        return $this->fbImage;
    }

    public function setFbImage($fbImage)
    {
        $this->fbImage = $fbImage;
    }

    public function getFbSiteName()
    {
        return $this->fbSiteName;
    }

    public function setFbSiteName($fbSiteName)
    {
        $this->fbSiteName = $fbSiteName;
    }

    public function getFbAdmins()
    {
        return $this->fbAdmins;
    }

    public function setFbAdmins($fbAdmins)
    {
        $this->fbAdmins = $fbAdmins;
    }

    public function getFbDescription()
    {
        if ($this->getFbDescriptionAuto()) {
            if (strlen($this->getSeoDescription()) > 50) {
                return substr($this->getSeoDescription(),0,50);
            } else {
                return $this->getSeoDescription();
            }
        }
        
        return $this->fbDescription;
    }

    public function setFbDescription($fbDescription)
    {
        $this->fbDescription = $fbDescription;
    }
    
    public function getFbDescriptionAuto()
    {
        return $this->fbDescriptionAuto;
    }

    public function setFbDescriptionAuto($fbDescriptionAuto)
    {
        $this->fbDescriptionAuto = $fbDescriptionAuto;
    }
    
    public function getFbAppId()
    {
        return $this->fbAppId;
    }

    public function setFbAppId($fbAppId)
    {
        $this->fbAppId = $fbAppId;
    }

    public function getFbLocationLatitude()
    {
        return $this->fbLocationLatitude;
    }

    public function setFbLocationLatitude($fbLocationLatitude)
    {
        $this->fbLocationLatitude = $fbLocationLatitude;
    }

    public function getFbLocationLongitude()
    {
        return $this->fbLocationLongitude;
    }

    public function setFbLocationLongitude($fbLocationLongitude)
    {
        $this->fbLocationLongitude = $fbLocationLongitude;
    }

    public function getFbLocationStreetAddress()
    {
        return $this->fbLocationStreetAddress;
    }

    public function setFbLocationStreetAddress($fbLocationStreetAddress)
    {
        $this->fbLocationStreetAddress = $fbLocationStreetAddress;
    }

    public function getFbLocationLocality()
    {
        return $this->fbLocationLocality;
    }

    public function setFbLocationLocality($fbLocationLocality)
    {
        $this->fbLocationLocality = $fbLocationLocality;
    }

    public function getFbLocationRegion()
    {
        return $this->fbLocationRegion;
    }

    public function setFbLocationRegion($fbLocationRegion)
    {
        $this->fbLocationRegion = $fbLocationRegion;
    }

    public function getFbLocationPostalCode()
    {
        return $this->fbLocationPostalCode;
    }

    public function setFbLocationPostalCode($fbLocationPostalCode)
    {
        $this->fbLocationPostalCode = $fbLocationPostalCode;
    }

    public function getFbLocationCountryName()
    {
        return $this->fbLocationCountryName;
    }

    public function setFbLocationCountryName($fbLocationCountryName)
    {
        $this->fbLocationCountryName = $fbLocationCountryName;
    }

    public function getFbEmail()
    {
        return $this->fbEmail;
    }

    public function setFbEmail($fbEmail)
    {
        $this->fbEmail = $fbEmail;
    }

    public function getFbPhoneNumber()
    {
        return $this->fbPhoneNumber;
    }

    public function setFbPhoneNumber($fbPhoneNumber)
    {
        $this->fbPhoneNumber = $fbPhoneNumber;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set published
     *
     * @param boolean $published
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set published_at
     *
     * @param datetime $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->published_at = $publishedAt;
    }

    /**
     * Get published_at
     *
     * @return datetime 
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }
}