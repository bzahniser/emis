<?php
/* @var $this CourseGroupController */
/* @var $model CourseGroup */

$this->breadcrumbs=array(
	'Course Groups'=>array('index'),
	$model->GroupID,
);

$this->menu=array(
	array('label'=>'List CourseGroup', 'url'=>array('index')),
	array('label'=>'Create CourseGroup', 'url'=>array('create')),
	array('label'=>'Update CourseGroup', 'url'=>array('update', 'id'=>$model->GroupID)),
	array('label'=>'Delete CourseGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GroupID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CourseGroup', 'url'=>array('admin')),
);
?>

<h1>View CourseGroup #<?php echo $model->GroupID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'GroupID',
		'GroupName',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
