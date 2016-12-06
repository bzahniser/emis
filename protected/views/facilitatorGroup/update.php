<?php
/* @var $this FacilitatorGroupController */
/* @var $model FacilitatorGroup */

$this->breadcrumbs=array(
	'Facilitator Groups'=>array('index'),
	$model->GroupID=>array('view','id'=>$model->GroupID),
	'Update',
);

$this->menu=array(
	array('label'=>'List FacilitatorGroup', 'url'=>array('index')),
	array('label'=>'Create FacilitatorGroup', 'url'=>array('create')),
	array('label'=>'View FacilitatorGroup', 'url'=>array('view', 'id'=>$model->GroupID)),
	array('label'=>'Manage FacilitatorGroup', 'url'=>array('admin')),
);
?>

<h1>Update FacilitatorGroup <?php echo $model->GroupID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>