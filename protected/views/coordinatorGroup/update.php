<?php
/* @var $this CoordinatorGroupController */
/* @var $model CoordinatorGroup */

$this->breadcrumbs=array(
	'Coordinator Groups'=>array('index'),
	$model->GroupID=>array('view','id'=>$model->GroupID),
	'Update',
);

$this->menu=array(
	array('label'=>'List CoordinatorGroup', 'url'=>array('index')),
	array('label'=>'Create CoordinatorGroup', 'url'=>array('create')),
	array('label'=>'View CoordinatorGroup', 'url'=>array('view', 'id'=>$model->GroupID)),
	array('label'=>'Manage CoordinatorGroup', 'url'=>array('admin')),
);
?>

<h1>Update CoordinatorGroup <?php echo $model->GroupID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>