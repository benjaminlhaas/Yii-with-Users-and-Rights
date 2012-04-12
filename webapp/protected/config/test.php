<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'name'=>'TEST',
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
      ),
      'db'=>require(dirname(__FILE__).'/testdb.php'),
			/* uncomment the following to provide test database connection
			'db'=>array(
				'connectionString'=>'DSN for test database',
			),
			*/
		),
	)
);;
