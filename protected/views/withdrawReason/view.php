<?php
/* @var $this WithdrawReasonController */
/* @var $model WithdrawReason */

$this->breadcrumbs=array(
	'Withdraw Reasons'=>array('index'),
	$model->ReasonID,
);

$this->menu=array(
	array('label'=>'List WithdrawReason', 'url'=>array('index')),
	array('label'=>'Create WithdrawReason', 'url'=>array('create')),
	array('label'=>'Update WithdrawReason', 'url'=>array('update', 'id'=>$model->ReasonID)),
	array('label'=>'Delete WithdrawReason', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ReasonID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WithdrawReason', 'url'=>array('admin')),
);
?>

<h1>View WithdrawReason #<?php echo $model->ReasonID; ?></h1>

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
