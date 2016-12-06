<?php
/* @var $this ValuechangeController */
/* @var $model Valuechange */

$this->breadcrumbs=array(
	'Valuechanges'=>array('index'),
	$model->ChangeID,
);

$this->menu=array(
	array('label'=>'List Valuechange', 'url'=>array('index')),
	array('label'=>'Create Valuechange', 'url'=>array('create')),
	array('label'=>'Update Valuechange', 'url'=>array('update', 'id'=>$model->ChangeID)),
	array('label'=>'Delete Valuechange', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ChangeID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Valuechange', 'url'=>array('admin')),
);
?>

<h1>View Valuechange #<?php echo $model->ChangeID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ProgramID',
		'ChangeID',
		'ChangeTypeID',
		'ChangeTypeName',
		'RecordID',
		'OldValue',
		'NewValue',
		'ChangeReasonID',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
