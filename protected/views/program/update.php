<?php
/* @var $this ProgramController */
/* @var $model Program */

$this->breadcrumbs=array(
	'Programs'=>array('index'),
	$model->ProgramID=>array('view','id'=>$model->ProgramID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Program', 'url'=>array('index')),
	array('label'=>'Create Program', 'url'=>array('create')),
	array('label'=>'View Program', 'url'=>array('view', 'id'=>$model->ProgramID)),
	array('label'=>'Manage Program', 'url'=>array('admin')),
);
?>

<h1>Update Program <?php echo $model->ProgramID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>