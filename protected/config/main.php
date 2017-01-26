<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('booster', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/yiibooster');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'IRC Education Management System',

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),
        

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.extensions.*',
                'application.extensions.EFullCalendar.*',
                'ext.pdffactory.*',
                'application.pdf.docs.*',
	),
        'aliases'=>array('booster'=>  realpath(__DIR__.'/extensions/boosterap'),),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'11',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('192.168.1.5','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,),
                'bootstrap' => array(
                    'class' => 'application.extensions.booster.components.Booster'),
            
                'pdfFactory'=>array(
                    'class'=>'ext.pdffactory.EPdfFactory',

                    'tcpdfPath'=>'ext.pdffactory.vendors.tcpdf', //=default: the path to the tcpdf library
                    'fpdiPath'=>'ext.pdffactory.vendors.fpdi', //=default: the path to the fpdi library

                    //the cache duration
                    'cacheHours'=>5, //-1 = cache disabled, 0 = never expires, hours if >0

                     //The alias path to the directory, where the pdf files should be created
                    'pdfPath'=>'application.runtime.pdf',

                    //The alias path to the *.pdf template files
                    //'templatesPath'=>'application.pdf.templates', //= default

                    //the params for the constructor of the TCPDF class  
                    // see: http://www.tcpdf.org/doc/code/classTCPDF.html 
                    'tcpdfOptions'=>array(
                          /* default values*/
                            'format'=>'A4',
                            'orientation'=>'L', //P=Portrait or 'L' = landscape
                            'unit'=>'mm', //measure unit: mm, cm, inch, or point
                            'unicode'=>true,
                            'encoding'=>'UTF-8',
                            'diskcache'=>false,
                            'pdfa'=>false,
                           
                    )
                ),
		

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		'db' => array (
		'connectionString' => 'mysql:host=emisdb.c8twamcdyd71.eu-west-1.rds.amazonaws.com;dbname=emisdb',
                    'emulatePrepare' => true,
                    'username' => 'emisdbadmin',
                    'password' => 'li1An^OMyHah',
                    'charset' => 'utf8',
		),
            
                'authManager'=>  array(
                    'class'=>'CDbAuthManager',
                    'connectionID'=>'db',
                ),
            
            
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
