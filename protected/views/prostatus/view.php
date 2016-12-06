<?php
/* @var $this ProstatusController */
/* @var $model Prostatus */

$this->breadcrumbs=array(
	'Prostatuses'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Prostatus', 'url'=>array('index')),
	array('label'=>'Create Prostatus', 'url'=>array('create')),
	array('label'=>'Update Prostatus', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Prostatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prostatus', 'url'=>array('admin')),
);
?>

<h1>View Prostatus #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'Name',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
