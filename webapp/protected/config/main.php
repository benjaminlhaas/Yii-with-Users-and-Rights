<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii Bootstrap',

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
		'application.modules.right.*',
    'application.modules.rights.components.*',
    'application.tests.CrudUnit.*',
    'ext.restfullyii.components.*',
    'ext.wunit.*',
    'ext.file.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Password1',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1'),
      'generatorPaths'=>array(
          'bootstrap.gii', // since 0.9.1
          'application.gii'
        ),
		),
		'user'=>array(
			'tableUsers' => 'users',
			'tableProfiles' => 'profiles',
			'tableProfileFields' => 'profiles_fields',
		
		),
		'rights'=>array(
			//'install'=>true,
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/user/login'),
		),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>require(dirname(__FILE__).'/routes.php'),
		),

		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('Authenticated', 'Guest'),
    ),

    'bootstrap'=>array(
      'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
    ),
    
    'wunit' => array(
      'class' => 'WUnit'
    ),
		
		'db'=>require(dirname(__FILE__).'/db.php'),
    'testdb'=>require(dirname(__FILE__).'/testdb.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
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
	'params'=>require(dirname(__FILE__).'/params.php'),
);
