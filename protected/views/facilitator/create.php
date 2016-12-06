<?php
/* @var $this FacilitatorController */
/* @var $model Facilitator */

$this->breadcrumbs=array(
	'Facilitators'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Facilitator', 'url'=>array('index')),
	array('label'=>'Manage Facilitator', 'url'=>array('admin')),
);
?>

<h1>Create Facilitator</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>