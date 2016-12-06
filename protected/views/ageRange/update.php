<?php
/* @var $this AgeRangeController */
/* @var $model AgeRange */

$this->breadcrumbs=array(
	'Age Ranges'=>array('index'),
	$model->RangeID=>array('view','id'=>$model->RangeID),
	'Update',
);

$this->menu=array(
	array('label'=>'List AgeRange', 'url'=>array('index')),
	array('label'=>'Create AgeRange', 'url'=>array('create')),
	array('label'=>'View AgeRange', 'url'=>array('view', 'id'=>$model->RangeID)),
	array('label'=>'Manage AgeRange', 'url'=>array('admin')),
);
?>

<h1>Update AgeRange <?php echo $model->RangeID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>