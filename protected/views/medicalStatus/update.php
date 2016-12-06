<?php
/* @var $this MedicalStatusController */
/* @var $model MedicalStatus */

$this->breadcrumbs=array(
	'Medical Statuses'=>array('index'),
	$model->StatusID=>array('view','id'=>$model->StatusID),
	'Update',
);

$this->menu=array(
	array('label'=>'List MedicalStatus', 'url'=>array('index')),
	array('label'=>'Create MedicalStatus', 'url'=>array('create')),
	array('label'=>'View MedicalStatus', 'url'=>array('view', 'id'=>$model->StatusID)),
	array('label'=>'Manage MedicalStatus', 'url'=>array('admin')),
);
?>

<h1>Update MedicalStatus <?php echo $model->StatusID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>