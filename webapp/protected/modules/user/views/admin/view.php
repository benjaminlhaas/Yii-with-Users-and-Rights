<?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
    'links'=>array(
	      	UserModule::t('Users')=>array('admin'),$model->username,
    ),
  )); ?>

<h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			//CHtml::linkButton(UserModule::t('Delete User'),array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
      array('label'=>'Create User', 'url'=>'/user/admin/create'),
      array('label'=>'Update User', 'url'=>'/user/admin/update/id/' . $model->id),
    ),
	)); 


	$attributes = array(
		'id',
		'username',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
		'password',
		'email',
		'activkey',
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):UserModule::t("Not visited")),
		),
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
  );
?>
<br/>
<?php $this->widget('bootstrap.widgets.BootDetailView', array(
    'data'=>$model,
    'attributes'=>$attributes,
)); ?>
