<?php
/* @var $this SessionChangeReasonController */
/* @var $model SessionChangeReason */

$this->breadcrumbs=array(
	'Session Change Reasons'=>array('index'),
	$model->ReasonID,
);

$this->menu=array(
	array('label'=>'List SessionChangeReason', 'url'=>array('index')),
	array('label'=>'Create SessionChangeReason', 'url'=>array('create')),
	array('label'=>'Update SessionChangeReason', 'url'=>array('update', 'id'=>$model->ReasonID)),
	array('label'=>'Delete SessionChangeReason', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ReasonID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SessionChangeReason', 'url'=>array('admin')),
);
?>

<h1>View SessionChangeReason #<?php echo $model->ReasonID; ?></h1>

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
