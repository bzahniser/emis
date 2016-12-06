<?php
/* @var $this AgeRangeController */
/* @var $model AgeRange */

$this->breadcrumbs=array(
	'Age Ranges'=>array('index'),
	$model->RangeID,
);

$this->menu=array(
	array('label'=>'List AgeRange', 'url'=>array('index')),
	array('label'=>'Create AgeRange', 'url'=>array('create')),
	array('label'=>'Update AgeRange', 'url'=>array('update', 'id'=>$model->RangeID)),
	array('label'=>'Delete AgeRange', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->RangeID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AgeRange', 'url'=>array('admin')),
);
?>

<h1>View AgeRange #<?php echo $model->RangeID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'RangeID',
		'RangeName',
		'RangeFrom',
		'RangeTo',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
