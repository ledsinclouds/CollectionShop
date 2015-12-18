LedsJsSlider
============

##Introduction

ZF2 Demo Module implementing Image Loading using Javascript [Raphael Library](http://raphaeljs.com/).

##Installation Using Composer

The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies:

    curl -s https://getcomposer.org/installer | php --

You would then invoke `composer` to install dependencies. Add to your composer.json

	"ledsinclouds/collection-shop": "dev-master"        
        
##Required Modules

	"doctrine/doctrine-module": "0.*",  
	"doctrine/doctrine-orm-module": "0.*",	
	"rwoverdijk/assetmanager": "1.*"
		        
##Configuration

Once module installed, you could declare the module into your __"config/application.config.php"__ by adding: 
	
        'Application',	
        'DoctrineModule',
		'DoctrineORMModule',
        'CollectionShop',
        'AssetManager',					         	

Copy/Paste the configuration file and change configuration options according to your social accounts.
Note: You must create applications for that...

    cp vendor/ledsinclouds/collection-shop/config/doctrine.local.php.dist config/autoload/doctrine.local.php
	
##Create your Database:

	./vendor/bin/doctrine-module orm:validate-schema
	./vendor/bin/doctrine-module orm:schema-tool:update --force
	
or copy the database file located in __public/data__ into the site data folder

	cp vendor/ledsinclouds/collection-shop/public/data/data.db data/data.db
	
##ViewHelper

You can use it with the ViewHelper provided in this module

	echo $this->showCollection();
