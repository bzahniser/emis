<?php
/* @var $this CoordinatorGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coordinator Groups',
);

$this->menu=array(
	array('label'=>'Create CoordinatorGroup', 'url'=>array('create')),
	array('label'=>'Manage CoordinatorGroup', 'url'=>array('admin')),
);
?>

<h1>Coordinator Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
