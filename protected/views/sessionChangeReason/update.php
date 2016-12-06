<?php
/* @var $this SessionChangeReasonController */
/* @var $model SessionChangeReason */

$this->breadcrumbs=array(
	'Session Change Reasons'=>array('index'),
	$model->ReasonID=>array('view','id'=>$model->ReasonID),
	'Update',
);

$this->menu=array(
	array('label'=>'List SessionChangeReason', 'url'=>array('index')),
	array('label'=>'Create SessionChangeReason', 'url'=>array('create')),
	array('label'=>'View SessionChangeReason', 'url'=>array('view', 'id'=>$model->ReasonID)),
	array('label'=>'Manage SessionChangeReason', 'url'=>array('admin')),
);
?>

<h1>Update SessionChangeReason <?php echo $model->ReasonID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>