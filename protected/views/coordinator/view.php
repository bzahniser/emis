<?php
/* @var $this CoordinatorController */
/* @var $model Coordinator */

$this->breadcrumbs=array(
	'Coordinators'=>array('index'),
	$model->CoordinatorID,
);

$this->menu=array(
	array('label'=>'List Coordinator', 'url'=>array('index')),
	array('label'=>'Create Coordinator', 'url'=>array('create')),
	array('label'=>'Update Coordinator', 'url'=>array('update', 'id'=>$model->CoordinatorID)),
	array('label'=>'Delete Coordinator', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CoordinatorID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coordinator', 'url'=>array('admin')),
);
?>

<h1>Coordinator #<?php echo $model->CoordinatorName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'CoordinatorID',
		'CoordinatorName',
		'CoordinatorLastName',
		'CoordinatorFullName',
		'documentType.TypeName',
		'DocumentID',
		'group.GroupName',
		'PhoneNumber',
		'Whatsup',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
