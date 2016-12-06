<?php
/* @var $this VacationController */
/* @var $model Vacation */

$this->breadcrumbs=array(
	'Vacations'=>array('admin'),
	$model->VacationID,
);

$this->menu=array(
	array('label'=>'List Vacation', 'url'=>array('index')),
	array('label'=>'Create Vacation', 'url'=>array('create')),
	array('label'=>'Update Vacation', 'url'=>array('update', 'id'=>$model->VacationID)),
	array('label'=>'Delete Vacation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->VacationID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vacation', 'url'=>array('admin')),
);
?>

<h1>View Vacation #<?php echo $model->VacationID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ProgramID',
		'VacationID',
		'VacationName',
		'VacationDate',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
