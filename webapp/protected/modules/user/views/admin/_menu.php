<br/>
<?php 
if(UserModule::isAdmin()) {
  $userList = array('label'=>'Manage User', 'url'=>Yii::app()->createUrl('user/admin'), 'active'=>true);
} else {
  $userList = array('label'=>'List User', 'url'=>Yii::app()->createUrl('user'), 'active'=>true);
}
$this->widget('bootstrap.widgets.BootMenu', array(
  'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
  'stacked'=>false, // whether this is a stacked menu
  'items'=>array(
      $userList,
      array('label'=>'Profile', 'url'=>Yii::app()->createUrl('user/profile')),
      array('label'=>'Edit', 'url'=>Yii::app()->createUrl('user/profile/edit')),
      array('label'=>'Change Password', 'url'=>Yii::app()->createUrl('user/profile/changepassword')),
      array('label'=>'logout', 'url'=>Yii::app()->createUrl('user/logout')),
  ),
)); ?>

<?php if(isset($list)): $this->widget('bootstrap.widgets.BootMenu', array(
  'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
  'stacked'=>false, // whether this is a stacked menu
  'items'=>$list,
)); endif; ?>


