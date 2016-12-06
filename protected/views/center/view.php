<?php
/* @var $this CenterController */
/* @var $model Center */

$this->breadcrumbs=array(
	'Centers'=>array('admin'),
	$model->CenterID,
);

$this->menu=array(
	array('label'=>'List Center', 'url'=>array('index')),
	array('label'=>'Create Center', 'url'=>array('create')),
	array('label'=>'Update Center', 'url'=>array('update', 'id'=>$model->CenterID)),
	array('label'=>'Delete Center', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CenterID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Center', 'url'=>array('admin')),
);
?>

<h1> Center #<?php echo $model->CenterName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'CenterID',
		'CenterName',
		'country.CountryName',
		'city.CityName',
		'coordinator.CoordinatorFullName',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
