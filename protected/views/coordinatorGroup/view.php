<?php
/* @var $this CoordinatorGroupController */
/* @var $model CoordinatorGroup */

$this->breadcrumbs=array(
	'Coordinator Groups'=>array('index'),
	$model->GroupID,
);

$this->menu=array(
	array('label'=>'List CoordinatorGroup', 'url'=>array('index')),
	array('label'=>'Create CoordinatorGroup', 'url'=>array('create')),
	array('label'=>'Update CoordinatorGroup', 'url'=>array('update', 'id'=>$model->GroupID)),
	array('label'=>'Delete CoordinatorGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GroupID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CoordinatorGroup', 'url'=>array('admin')),
);
?>

<h1>View CoordinatorGroup #<?php echo $model->GroupID; ?></h1>

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
