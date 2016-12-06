<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->ProgramID,
);

$this->menu=array(
	array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'Create Program', 'url'=>array('create')),
	array('label'=>'Update Program', 'url'=>array('update', 'id'=>$model->ProgramID)),
	array('label'=>'Delete Program', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ProgramID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>View Program #<?php echo $model->ProgramID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ProgramID',
		'ProgramName',
		'ProgramDescription',
		'country.CountryName',
		'StartDate',
		'BudgetID',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
