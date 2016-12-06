<?php
/* @var $this RecpActionController */
/* @var $model RecpAction */

$this->breadcrumbs=array(
	'Recp Actions'=>array('index'),
	$model->Name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List RecpAction', 'url'=>array('index')),
	array('label'=>'Create RecpAction', 'url'=>array('create')),
	array('label'=>'View RecpAction', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage RecpAction', 'url'=>array('admin')),
);
?>

<h1>Update RecpAction <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>