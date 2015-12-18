<?php
namespace CollectionShop\View\Helper;

use CollectionShop\Service\CollectionService;
use Zend\View\Helper\AbstractHtmlElement;

class CollectionViewHelper extends AbstractHtmlElement{
	
	protected $collectionService;
	protected $options = array(
        'sketch' => array('class' => 'sketch'),
        'background' => array('class' => 'background'),
        'backgroundId' => array('id' => 'background'),
        'mannequib' => array('id' => 'mannequib'),
        
        'foreground' => array('class' => 'foreground'),
        'foregroundId' => array('id' => 'foreground'),
        'links_container' => array('class' => 'links_container'),
        'imageLink' => array('class' => 'imageLink'), 
                       
        'thumbs' => array(
            'class' => 'thumbs',
        ),        
        'image_attributes' => array(),
        'link_attributes' => array(),
        'resize_options' => array(),	
	);
		
	public function __construct(CollectionService $collectionService){
        $this->collectionService = $collectionService;
    }	
    	
	public function __invoke($options = array()){
        $this->options = array_merge_recursive($this->options, $options);
        return $this;
    }
    
	public function openTag(){ 
        $this->getView()->inlineScript()
            ->appendFile($this->getView()->basePath('/js/raphael.js'));
        $this->getView()->inlineScript()
            ->appendFile($this->getView()->basePath('/js/collection.js'));            
        $this->getView()->headLink()
            ->appendStylesheet($this->getView()->basePath('/css/collection.css'));
              
		$sketch = $this->htmlAttribs($this->options['sketch']);
		$background = $this->htmlAttribs($this->options['background']);						
        $format = "<div%s><div%s>";

        return sprintf($format, $background, $sketch) . PHP_EOL;     
    }
    
    public function getBackground(){
		$backgroundId = $this->htmlAttribs($this->options['backgroundId']);
		$mannequib = $this->htmlAttribs($this->options['mannequib']);						
        $format = "<div%s><img%s src='/img/lunettes/mannequib.jpg'></div>";

        return sprintf($format, $backgroundId, $mannequib) . PHP_EOL;  	
	}
	
    public function getForground(){
		$foreground = $this->htmlAttribs($this->options['foreground']);
		//$foregroundId = $this->htmlAttribs($this->options['foreground']);		
		$links_container = $this->htmlAttribs($this->options['links_container']);
		$imageLink = $this->htmlAttribs($this->options['imageLink']);		
		
								
        $format = "<div%s id='foreground'><ul%s><li%s></li></ul></div>";

        return sprintf($format, $foreground, $foregroundId, $links_container, $imageLink) . PHP_EOL;  	
	}	
	
	public function closeTag(){
        return '</div></div>' . PHP_EOL;
    }
    	
	public function collection(){

        $markup = '<div class="row">';
        foreach($this->getCollection() as $slide) {
			
            $imgAttribs['id'] = $slide->getId();
            $imgAttribs['class'] = 'image';          
            $imgAttribs['src'] = $slide->getThumb();
            $imgAttribs['alt'] = $slide->getAlt();
            $imgAttribs['title'] = $slide->getTitle();            
            $imgAttribs = array_merge($imgAttribs, $this->options['image_attributes']);

            $format = '<ul class="margin10 thumbs"><li class="imageMenu"><img%s><span class="items-menu">loadImage'.$slide->getId().'</span></li></ul>';
            $args = array(
                $this->htmlAttribs($imgAttribs)
            );
            $markup .= vsprintf($format, $args) . PHP_EOL;
        }
        $markup .= '</div>';        
        return $markup;
    }     
	
	protected function getCollection(){
        $collection = $this->collectionService->findAll();
        if (!$collection) {
            return array();
        }
        return $collection;
    }	    
    
	public function __toString(){
        return $this->openTag() . $this->getBackground() . $this->getForground() . $this->closeTag() . $this->collection();
    }        
}
