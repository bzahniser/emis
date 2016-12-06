<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	$model->SubjectID,
);

$this->menu=array(
	array('label'=>'List Subject', 'url'=>array('index')),
	array('label'=>'Create Subject', 'url'=>array('create')),
	array('label'=>'Update Subject', 'url'=>array('update', 'id'=>$model->SubjectID)),
	array('label'=>'Delete Subject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SubjectID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Subject', 'url'=>array('admin')),
);
?>

<h1>View Subject #<?php echo $model->SubjectID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SubjectID',
		'SubjectName',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
