<?php $this->beginWidget('bootstrap.widgets.BootHero', array(
    'heading'=>CHtml::encode(Yii::app()->name),
)); ?>
<p>Congratulations! You have successfully created your Yii application</p>
<br/>
<p><a class="btn btn-primary btn-large" href="/user/login">Login</a></p>
<?php $this->endWidget(); ?>
