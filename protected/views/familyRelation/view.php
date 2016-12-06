<?php
/* @var $this FamilyRelationController */
/* @var $model FamilyRelation */

$this->breadcrumbs=array(
	'Family Relations'=>array('index'),
	$model->RelationID,
);

$this->menu=array(
	array('label'=>'List FamilyRelation', 'url'=>array('index')),
	array('label'=>'Create FamilyRelation', 'url'=>array('create')),
	array('label'=>'Update FamilyRelation', 'url'=>array('update', 'id'=>$model->RelationID)),
	array('label'=>'Delete FamilyRelation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->RelationID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FamilyRelation', 'url'=>array('admin')),
);
?>

<h1>View FamilyRelation #<?php echo $model->RelationID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'RelationID',
		'RelationName',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
