<?php
return array(
'ProfileField_1' => array(
	'id' =>'1',
	'varname' =>'lastname',
	'title' =>'Last Name',
	'field_type' =>'VARCHAR',
	'field_size' =>'50',
	'field_size_min' =>'3',
	'required' =>'1',
	'match' =>'',
	'range' =>'',
	'error_message' =>'Incorrect Last Name (length between 3 and 50 characters).',
	'other_validator' =>'',
	'default' =>'',
	'widget' =>'',
	'widgetparams' =>'',
	'position' =>'1',
	'visible' =>'3',
),
'ProfileField_2' => array(
	'id' =>'2',
	'varname' =>'firstname',
	'title' =>'First Name',
	'field_type' =>'VARCHAR',
	'field_size' =>'50',
	'field_size_min' =>'3',
	'required' =>'1',
	'match' =>'',
	'range' =>'',
	'error_message' =>'Incorrect First Name (length between 3 and 50 characters).',
	'other_validator' =>'',
	'default' =>'',
	'widget' =>'',
	'widgetparams' =>'',
	'position' =>'0',
	'visible' =>'3',
),
'ProfileField_3' => array(
	'id' =>'3',
	'varname' =>'birthday',
	'title' =>'Birthday',
	'field_type' =>'DATE',
	'field_size' =>'0',
	'field_size_min' =>'0',
	'required' =>'2',
	'match' =>'',
	'range' =>'',
	'error_message' =>'',
	'other_validator' =>'',
	'default' =>'0000-00-00',
	'widget' =>'UWjuidate',
	'widgetparams' =>'{"ui-theme":"redmond"}',
	'position' =>'3',
	'visible' =>'2',
),
);