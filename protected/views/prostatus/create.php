<?php
/* @var $this ProstatusController */
/* @var $model Prostatus */

$this->breadcrumbs=array(
	'Prostatuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prostatus', 'url'=>array('index')),
	array('label'=>'Manage Prostatus', 'url'=>array('admin')),
);
?>

<h1>Create Prostatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>