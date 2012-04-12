<?php $this->widget('bootstrap.widgets.BootButtonGroup', array(
    'buttons'=>array(
      array(
        'label'=>Rights::t('core', 'Assignments'),
        'url'=>array('assignment/view'),
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
      ),
      array(
        'label'=>Rights::t('core', 'Permissions'),
        'url'=>array('authItem/permissions'),
        'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
      ),
      array(
        'label'=>Rights::t('core', 'Roles'),
        'url'=>array('authItem/roles'),
        'type'=>'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
      ),
      array(
        'label'=>Rights::t('core', 'Tasks'),
        'url'=>array('authItem/tasks'),
        'type'=>'warning', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
      ),
      array(
        'label'=>Rights::t('core', 'Operations'),
        'url'=>array('authItem/operations'),
        'type'=>'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
      )        
    ),
)); ?>
