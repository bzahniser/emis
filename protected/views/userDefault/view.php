<?php
/* @var $this UserDefaultController */
/* @var $model UserDefault */

$this->breadcrumbs=array(
	'User Defaults'=>array('index'),
	$model->DefaultID,
);

$this->menu=array(
	array('label'=>'List UserDefault', 'url'=>array('index')),
	array('label'=>'Create UserDefault', 'url'=>array('create')),
	array('label'=>'Update UserDefault', 'url'=>array('update', 'id'=>$model->DefaultID)),
	array('label'=>'Delete UserDefault', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->DefaultID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserDefault', 'url'=>array('admin')),
);
?>

<h1>View UserDefault #<?php echo $model->DefaultID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ProgramID',
		'DefaultID',
		'UserID',
		'FieldName',
		'DefaultValue',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
