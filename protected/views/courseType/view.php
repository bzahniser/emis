<?php
/* @var $this CourseTypeController */
/* @var $model CourseType */

$this->breadcrumbs=array(
	'Course Types'=>array('index'),
	$model->CourseTypeID,
);

$this->menu=array(
	array('label'=>'List CourseType', 'url'=>array('index')),
	array('label'=>'Create CourseType', 'url'=>array('create')),
	array('label'=>'Update CourseType', 'url'=>array('update', 'id'=>$model->CourseTypeID)),
	array('label'=>'Delete CourseType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CourseTypeID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CourseType', 'url'=>array('admin')),
);
?>

<h1>View CourseType #<?php echo $model->CourseTypeID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CourseTypeID',
		'CourseTypeName',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
