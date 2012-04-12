<?php 
if(UserModule::isAdmin()) {
  $userList = array('label'=>'Manage User', 'url'=>Yii::app()->createUrl('user/admin'));
} else {
  $userList = array('label'=>'List User', 'url'=>Yii::app()->createUrl('user'));
}
$this->widget('bootstrap.widgets.BootMenu', array(
  'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
  'stacked'=>false, // whether this is a stacked menu
  'items'=>array(
      $userList,
      array('label'=>'Profile', 'url'=>UserModule::t('Profile'), 'active'=>($this->activePage=='profile')?true:false),
      array('label'=>'Edit', 'url'=>Yii::app()->createUrl('user/profile/edit'), 'active'=>($this->activePage=='edit')?true:false),
      array('label'=>'Change Password', 'url'=>Yii::app()->createUrl('user/profile/changepassword'), 'active'=>($this->activePage=='changepassword')?true:false),
      array('label'=>'logout', 'url'=>Yii::app()->createUrl('user/logout')),
  ),
)); ?>

