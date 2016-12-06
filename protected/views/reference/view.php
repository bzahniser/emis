<?php
/* @var $this ReferenceController */
/* @var $model Reference */

$this->breadcrumbs=array(
	'References'=>array('index'),
	$model->RefrenceID,
);

$this->menu=array(
	array('label'=>'List Reference', 'url'=>array('index')),
	array('label'=>'Create Reference', 'url'=>array('create')),
	array('label'=>'Update Reference', 'url'=>array('update', 'id'=>$model->RefrenceID)),
	array('label'=>'Delete Reference', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->RefrenceID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reference', 'url'=>array('admin')),
);
?>

<h1>View Reference #<?php echo $model->RefrenceID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'RefrenceID',
		'RefrenceName',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
