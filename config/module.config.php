<?php
return array(
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                'CollectionShop' => __DIR__ . '/../public',
            ),
        ),
    ),  
	'controllers' => array(
		'invokables' => array(
			'CollectionShop\Controller\Index' => 'CollectionShop\Controller\IndexController',
		),
	),
	'router' => array(
		'routes' => array(
			'collection-shop' => array(
				'type' => 'segment',
				'options' => array(
					'route' => '/collection-shop[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'CollectionShop\Controller\Index',
						'action' => 'index',
					),
				),
			),
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view'
		),
		'template_map' => array(
			'canvas' => __DIR__ . '/../view/partials/canvas.phtml'
		)
	),
    'doctrine' => array(
        'driver' => array(
            'Collection_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/CollectionShop/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'CollectionShop\Entity' => 'Collection_driver',
                ),
            ),
		),
	),	
);
