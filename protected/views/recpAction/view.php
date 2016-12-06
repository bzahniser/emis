<?php
/* @var $this RecpActionController */
/* @var $model RecpAction */

$this->breadcrumbs=array(
	'Recp Actions'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List RecpAction', 'url'=>array('index')),
	array('label'=>'Create RecpAction', 'url'=>array('create')),
	array('label'=>'Update RecpAction', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete RecpAction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RecpAction', 'url'=>array('admin')),
);
?>

<h1>View RecpAction #<?php echo $model->ID; ?></h1>

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
