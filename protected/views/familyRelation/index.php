<?php
/* @var $this FamilyRelationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Family Relations',
);

$this->menu=array(
	array('label'=>'Create FamilyRelation', 'url'=>array('create')),
	array('label'=>'Manage FamilyRelation', 'url'=>array('admin')),
);
?>

<h1>Family Relations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
