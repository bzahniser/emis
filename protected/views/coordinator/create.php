<?php
/* @var $this CoordinatorController */
/* @var $model Coordinator */

$this->breadcrumbs=array(
	'Coordinators'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coordinator', 'url'=>array('index')),
	array('label'=>'Manage Coordinator', 'url'=>array('admin')),
);
?>

<h1>Create Coordinator</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>