<?php
namespace CollectionShop\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CollectionEntity{

	use \CollectionShop\Traits\ReadOnly;

    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $url;
 
     /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $thumb;   

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $alt;

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param string $alt
     * @return $this
     */
    public function setAlt($alt){
        $this->alt = $alt;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlt(){
        return $this->alt;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title){
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url){
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->url;
    }
    

    /**
     * @return string
     */
    public function getThumb(){
        return $this->thumb;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setThumb($thumb){
        $this->thumb = $thumb;

        return $this;
    }
    
}
