<?php
/* @var $this CoordinatorGroupController */
/* @var $model CoordinatorGroup */

$this->breadcrumbs=array(
	'Coordinator Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CoordinatorGroup', 'url'=>array('index')),
	array('label'=>'Manage CoordinatorGroup', 'url'=>array('admin')),
);
?>

<h1>Create CoordinatorGroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>