<?php
/* @var $this ValuechangeController */
/* @var $model Valuechange */

$this->breadcrumbs=array(
	'Valuechanges'=>array('index'),
	$model->ChangeID=>array('view','id'=>$model->ChangeID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Valuechange', 'url'=>array('index')),
	array('label'=>'Create Valuechange', 'url'=>array('create')),
	array('label'=>'View Valuechange', 'url'=>array('view', 'id'=>$model->ChangeID)),
	array('label'=>'Manage Valuechange', 'url'=>array('admin')),
);
?>

<h1>Update Valuechange <?php echo $model->ChangeID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>