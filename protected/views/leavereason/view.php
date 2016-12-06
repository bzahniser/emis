<?php
/* @var $this LeavereasonController */
/* @var $model Leavereason */

$this->breadcrumbs=array(
	'Leavereasons'=>array('index'),
	$model->ReasonID,
);

$this->menu=array(
	array('label'=>'List Leavereason', 'url'=>array('index')),
	array('label'=>'Create Leavereason', 'url'=>array('create')),
	array('label'=>'Update Leavereason', 'url'=>array('update', 'id'=>$model->ReasonID)),
	array('label'=>'Delete Leavereason', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ReasonID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Leavereason', 'url'=>array('admin')),
);
?>

<h1>View Leavereason #<?php echo $model->ReasonID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ReasonID',
		'ReasonName',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
