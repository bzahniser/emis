<?php
/* @var $this CourseTypeController */
/* @var $model CourseType */

$this->breadcrumbs=array(
	'Course Types'=>array('index'),
	$model->CourseTypeID=>array('view','id'=>$model->CourseTypeID),
	'Update',
);

$this->menu=array(
	array('label'=>'List CourseType', 'url'=>array('index')),
	array('label'=>'Create CourseType', 'url'=>array('create')),
	array('label'=>'View CourseType', 'url'=>array('view', 'id'=>$model->CourseTypeID)),
	array('label'=>'Manage CourseType', 'url'=>array('admin')),
);
?>

<h1>Update CourseType <?php echo $model->CourseTypeID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>