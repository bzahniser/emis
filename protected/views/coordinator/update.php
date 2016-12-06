<?php
/* @var $this CoordinatorController */
/* @var $model Coordinator */

$this->breadcrumbs=array(
	'Coordinators'=>array('index'),
	$model->CoordinatorID=>array('view','id'=>$model->CoordinatorID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coordinator', 'url'=>array('index')),
	array('label'=>'Create Coordinator', 'url'=>array('create')),
	array('label'=>'View Coordinator', 'url'=>array('view', 'id'=>$model->CoordinatorID)),
	array('label'=>'Manage Coordinator', 'url'=>array('admin')),
);
?>

<h1>Update Coordinator <?php echo $model->CoordinatorID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>