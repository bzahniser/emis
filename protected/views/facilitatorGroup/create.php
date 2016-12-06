<?php
/* @var $this FacilitatorGroupController */
/* @var $model FacilitatorGroup */

$this->breadcrumbs=array(
	'Facilitator Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FacilitatorGroup', 'url'=>array('index')),
	array('label'=>'Manage FacilitatorGroup', 'url'=>array('admin')),
);
?>

<h1>Create FacilitatorGroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>