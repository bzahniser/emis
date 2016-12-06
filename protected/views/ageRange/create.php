<?php
/* @var $this AgeRangeController */
/* @var $model AgeRange */

$this->breadcrumbs=array(
	'Age Ranges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AgeRange', 'url'=>array('index')),
	array('label'=>'Manage AgeRange', 'url'=>array('admin')),
);
?>

<h1>Create AgeRange</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>