<?php

namespace CollectionShop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController{

    public function indexAction(){
		if($this->request->isXmlHttpRequest())
			$view->setTerminal(true);
		return $vm;
    }
    
    public function testAction(){
		return new ViewModel();
    }    

}

