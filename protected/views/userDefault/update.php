<?php
/* @var $this UserDefaultController */
/* @var $model UserDefault */

$this->breadcrumbs=array(
	'User Defaults'=>array('index'),
	$model->DefaultID=>array('view','id'=>$model->DefaultID),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserDefault', 'url'=>array('index')),
	array('label'=>'Create UserDefault', 'url'=>array('create')),
	array('label'=>'View UserDefault', 'url'=>array('view', 'id'=>$model->DefaultID)),
	array('label'=>'Manage UserDefault', 'url'=>array('admin')),
);
?>

<h1>Update UserDefault <?php echo $model->DefaultID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>