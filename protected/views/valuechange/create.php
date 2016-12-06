<?php
/* @var $this ValuechangeController */
/* @var $model Valuechange */

$this->breadcrumbs=array(
	'Valuechanges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Valuechange', 'url'=>array('index')),
	array('label'=>'Manage Valuechange', 'url'=>array('admin')),
);
?>

<h1>Create Valuechange</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>