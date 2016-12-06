<?php
/* @var $this VacationController */
/* @var $model Vacation */

$this->breadcrumbs=array(
	'Vacations'=>array('index'),
	$model->VacationID=>array('view','id'=>$model->VacationID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vacation', 'url'=>array('index')),
	array('label'=>'Create Vacation', 'url'=>array('create')),
	array('label'=>'View Vacation', 'url'=>array('view', 'id'=>$model->VacationID)),
	array('label'=>'Manage Vacation', 'url'=>array('admin')),
);
?>

<h1>Update Vacation <?php echo $model->VacationID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>