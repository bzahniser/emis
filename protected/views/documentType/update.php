<?php
/* @var $this DocumentTypeController */
/* @var $model DocumentType */

$this->breadcrumbs=array(
	'Document Types'=>array('index'),
	$model->TypeID=>array('view','id'=>$model->TypeID),
	'Update',
);

$this->menu=array(
	array('label'=>'List DocumentType', 'url'=>array('index')),
	array('label'=>'Create DocumentType', 'url'=>array('create')),
	array('label'=>'View DocumentType', 'url'=>array('view', 'id'=>$model->TypeID)),
	array('label'=>'Manage DocumentType', 'url'=>array('admin')),
);
?>

<h1>Update DocumentType <?php echo $model->TypeID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>