<?php
/* @var $this ProspectBenfeciaryController */
/* @var $model ProspectBenfeciary */

$this->breadcrumbs=array(
	'Prospect Benfeciaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Benfeciary', 'url'=>array('index')),
	array('label'=>'Manage Benfeciary', 'url'=>array('admin')),
);
?>

<h1>Create ProspectBenfeciary</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>