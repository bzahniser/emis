<?php
/* @var $this LeavereasonController */
/* @var $model Leavereason */

$this->breadcrumbs=array(
	'Leavereasons'=>array('index'),
	$model->ReasonID=>array('view','id'=>$model->ReasonID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Leavereason', 'url'=>array('index')),
	array('label'=>'Create Leavereason', 'url'=>array('create')),
	array('label'=>'View Leavereason', 'url'=>array('view', 'id'=>$model->ReasonID)),
	array('label'=>'Manage Leavereason', 'url'=>array('admin')),
);
?>

<h1>Update Leavereason <?php echo $model->ReasonID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>