<?php
/* @var $this CenterController */
/* @var $model Center */

$this->breadcrumbs=array(
	'Centers'=>array('index'),
	$model->CenterID=>array('view','id'=>$model->CenterID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Center', 'url'=>array('index')),
	array('label'=>'Create Center', 'url'=>array('create')),
	array('label'=>'View Center', 'url'=>array('view', 'id'=>$model->CenterID)),
	array('label'=>'Manage Center', 'url'=>array('admin')),
);
?>

<h1>Update Center <?php echo $model->CenterID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>