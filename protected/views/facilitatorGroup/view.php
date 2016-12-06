<?php
/* @var $this FacilitatorGroupController */
/* @var $model FacilitatorGroup */

$this->breadcrumbs=array(
	'Facilitator Groups'=>array('index'),
	$model->GroupID,
);

$this->menu=array(
	array('label'=>'List FacilitatorGroup', 'url'=>array('index')),
	array('label'=>'Create FacilitatorGroup', 'url'=>array('create')),
	array('label'=>'Update FacilitatorGroup', 'url'=>array('update', 'id'=>$model->GroupID)),
	array('label'=>'Delete FacilitatorGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GroupID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FacilitatorGroup', 'url'=>array('admin')),
);
?>

<h1>View FacilitatorGroup #<?php echo $model->GroupID; ?></h1>

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
