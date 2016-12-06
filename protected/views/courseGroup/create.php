<?php
/* @var $this CourseGroupController */
/* @var $model CourseGroup */

$this->breadcrumbs=array(
	'Course Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CourseGroup', 'url'=>array('index')),
	array('label'=>'Manage CourseGroup', 'url'=>array('admin')),
);
?>

<h1>Create CourseGroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>