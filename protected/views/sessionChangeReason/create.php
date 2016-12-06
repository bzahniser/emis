<?php
/* @var $this SessionChangeReasonController */
/* @var $model SessionChangeReason */

$this->breadcrumbs=array(
	'Session Change Reasons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SessionChangeReason', 'url'=>array('index')),
	array('label'=>'Manage SessionChangeReason', 'url'=>array('admin')),
);
?>

<h1>Create SessionChangeReason</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>