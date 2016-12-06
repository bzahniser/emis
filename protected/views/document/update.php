<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->DID=>array('view','id'=>$model->DID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'Create Document', 'url'=>array('create')),
	array('label'=>'View Document', 'url'=>array('view', 'id'=>$model->DID)),
	array('label'=>'Manage Document', 'url'=>array('admin')),
);
?>

<h1>Update Document <?php echo $model->DID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>