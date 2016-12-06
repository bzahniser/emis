<?php
/* @var $this ProstatusController */
/* @var $model Prostatus */

$this->breadcrumbs=array(
	'Prostatuses'=>array('index'),
	$model->Name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prostatus', 'url'=>array('index')),
	array('label'=>'Create Prostatus', 'url'=>array('create')),
	array('label'=>'View Prostatus', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Prostatus', 'url'=>array('admin')),
);
?>

<h1>Update Prostatus <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>