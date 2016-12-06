<?php
/* @var $this UserDefaultController */
/* @var $model UserDefault */

$this->breadcrumbs=array(
	'User Defaults'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserDefault', 'url'=>array('index')),
	array('label'=>'Manage UserDefault', 'url'=>array('admin')),
);
?>

<h1>Create UserDefault</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>