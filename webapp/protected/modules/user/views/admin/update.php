<?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
    'links'=>array(
	      (UserModule::t('Users'))=>array('admin'),
	      $model->username=>array('view','id'=>$model->id),
	      (UserModule::t('Update')),
    ),
  )); ?>

<h1><?php echo  UserModule::t('Update User')." ".$model->id; ?></h1>

<?php echo $this->renderPartial('_menu', array(
  'list'=> array(
      array('label'=>'Create User', 'url'=>'/user/admin/create'),
      array('label'=>'View User', 'url'=>'/user/admin/view/id/' . $model->id)
		),
	)); 

	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>
