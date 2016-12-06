<?php
/* @var $this MedicalStatusController */
/* @var $model MedicalStatus */

$this->breadcrumbs=array(
	'Medical Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MedicalStatus', 'url'=>array('index')),
	array('label'=>'Manage MedicalStatus', 'url'=>array('admin')),
);
?>

<h1>Create MedicalStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>