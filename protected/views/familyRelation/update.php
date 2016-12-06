<?php
/* @var $this FamilyRelationController */
/* @var $model FamilyRelation */

$this->breadcrumbs=array(
	'Family Relations'=>array('index'),
	$model->RelationID=>array('view','id'=>$model->RelationID),
	'Update',
);

$this->menu=array(
	array('label'=>'List FamilyRelation', 'url'=>array('index')),
	array('label'=>'Create FamilyRelation', 'url'=>array('create')),
	array('label'=>'View FamilyRelation', 'url'=>array('view', 'id'=>$model->RelationID)),
	array('label'=>'Manage FamilyRelation', 'url'=>array('admin')),
);
?>

<h1>Update FamilyRelation <?php echo $model->RelationID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>