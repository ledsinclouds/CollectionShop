<?php 
namespace CollectionShop\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CollectionServiceFactory implements FactoryInterface{
	
	public function createService(ServiceLocatorInterface $sl){
		$objectManager = $sl->get('Doctrine\ORM\EntityManager');
		$collectionService = new CollectionService($objectManager);
		return $collectionService;
	}
	
}
