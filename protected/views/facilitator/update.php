<?php
/* @var $this FacilitatorController */
/* @var $model Facilitator */

$this->breadcrumbs=array(
	'Facilitators'=>array('index'),
	$model->FacilitatorID=>array('view','id'=>$model->FacilitatorID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Facilitator', 'url'=>array('index')),
	array('label'=>'Create Facilitator', 'url'=>array('create')),
	array('label'=>'View Facilitator', 'url'=>array('view', 'id'=>$model->FacilitatorID)),
	array('label'=>'Manage Facilitator', 'url'=>array('admin')),
);
?>

<h1>Update Facilitator <?php echo $model->FacilitatorID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>