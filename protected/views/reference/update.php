<?php
/* @var $this ReferenceController */
/* @var $model Reference */

$this->breadcrumbs=array(
	'References'=>array('index'),
	$model->RefrenceID=>array('view','id'=>$model->RefrenceID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reference', 'url'=>array('index')),
	array('label'=>'Create Reference', 'url'=>array('create')),
	array('label'=>'View Reference', 'url'=>array('view', 'id'=>$model->RefrenceID)),
	array('label'=>'Manage Reference', 'url'=>array('admin')),
);
?>

<h1>Update Reference <?php echo $model->RefrenceID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>