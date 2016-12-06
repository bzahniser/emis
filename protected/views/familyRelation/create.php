<?php
/* @var $this FamilyRelationController */
/* @var $model FamilyRelation */

$this->breadcrumbs=array(
	'Family Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FamilyRelation', 'url'=>array('index')),
	array('label'=>'Manage FamilyRelation', 'url'=>array('admin')),
);
?>

<h1>Create FamilyRelation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>