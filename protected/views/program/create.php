<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'Programs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>Create Program</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>