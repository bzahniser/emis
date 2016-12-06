<?php
/* @var $this CourseTypeController */
/* @var $model CourseType */

$this->breadcrumbs=array(
	'Course Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CourseType', 'url'=>array('index')),
	array('label'=>'Manage CourseType', 'url'=>array('admin')),
);
?>

<h1>Create CourseType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>