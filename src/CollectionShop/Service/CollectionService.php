<?php
namespace CollectionShop\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use CollectionShop\Entity\CollectionEntity;

class CollectionService{
	
	protected $objectManager;
	protected $objectRepository;	
	
	public function __construct(ObjectManager $objectManager){
		$this->objectManager = $objectManager;
		$this->objectRepository = $objectManager->getRepository('CollectionShop\Entity\CollectionEntity');
	}
	
	public function findAll(){
        return $this->objectRepository->findAll();
	}	
	
}
