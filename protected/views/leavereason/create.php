<?php
/* @var $this LeavereasonController */
/* @var $model Leavereason */

$this->breadcrumbs=array(
	'Leavereasons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Leavereason', 'url'=>array('index')),
	array('label'=>'Manage Leavereason', 'url'=>array('admin')),
);
?>

<h1>Create Leavereason</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>