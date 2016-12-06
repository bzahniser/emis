<?php
/* @var $this CourseGroupController */
/* @var $model CourseGroup */

$this->breadcrumbs=array(
	'Course Groups'=>array('index'),
	$model->GroupID=>array('view','id'=>$model->GroupID),
	'Update',
);

$this->menu=array(
	array('label'=>'List CourseGroup', 'url'=>array('index')),
	array('label'=>'Create CourseGroup', 'url'=>array('create')),
	array('label'=>'View CourseGroup', 'url'=>array('view', 'id'=>$model->GroupID)),
	array('label'=>'Manage CourseGroup', 'url'=>array('admin')),
);
?>

<h1>Update CourseGroup <?php echo $model->GroupID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>