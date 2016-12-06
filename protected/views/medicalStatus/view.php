<?php
/* @var $this MedicalStatusController */
/* @var $model MedicalStatus */

$this->breadcrumbs=array(
	'Medical Statuses'=>array('index'),
	$model->StatusID,
);

$this->menu=array(
	array('label'=>'List MedicalStatus', 'url'=>array('index')),
	array('label'=>'Create MedicalStatus', 'url'=>array('create')),
	array('label'=>'Update MedicalStatus', 'url'=>array('update', 'id'=>$model->StatusID)),
	array('label'=>'Delete MedicalStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->StatusID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MedicalStatus', 'url'=>array('admin')),
);
?>

<h1>View MedicalStatus #<?php echo $model->StatusID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'StatusID',
		'StatusName',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
