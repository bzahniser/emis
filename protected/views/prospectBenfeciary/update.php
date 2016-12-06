<?php
/* @var $this ProspectBenfeciaryController */
/* @var $model ProspectBenfeciary */

$this->breadcrumbs=array(
	'Prospect Benfeciaries'=>array('index'),
	$model->Name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Benfeciary', 'url'=>array('index')),
	array('label'=>'Create Benfeciary', 'url'=>array('create')),
	array('label'=>'View Benfeciary', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Benfeciary', 'url'=>array('admin')),
);
?>

<h1>Update ProspectBenfeciary <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>