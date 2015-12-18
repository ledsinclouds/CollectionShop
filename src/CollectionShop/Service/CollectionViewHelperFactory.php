<?php
namespace CollectionShop\Service;

use CollectionShop\View\Helper\CollectionViewHelper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CollectionViewHelperFactory implements FactoryInterface{
	
	public function createService(ServiceLocatorInterface $sl){
		$collectionService = $sl->getServiceLocator()->get('collectionService');
		$helper = new CollectionViewHelper($collectionService);
		return $helper;
	}
	
}
