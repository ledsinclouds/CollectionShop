<?php
namespace CollectionShop;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\Event;
use Zend\Mvc\Router\RouteMatch;
use Zend\View\Model\ViewModel;


class Module{

	public function init(ModuleManager $moduleManager){
		$sharedEvents = $moduleManager->getEventManager()->getSharedManager();
		$sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e){
			$controller = $e->getTarget();
			$controller->layout('collection-shop/layout/layout');
		});
	}
	
	public function getServiceConfig(){
		return array(
			'factories' => array(
				'collectionService' => 'CollectionShop\Service\CollectionServiceFactory'
			)
		);
	}
	
	public function getViewHelperConfig(){
		return array(
			'invokables' => array(
				'showCollection' => 'CollectionShop\View\Helper\ShowCollection'
			),		
			'factories' => array(
				'collectionView' => 'CollectionShop\Service\CollectionViewHelperFactory'
			)
		);
	}
	
    public function getConfig(){
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig(){
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
