<?php
/* @var $this AgeRangeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Age Ranges',
);

$this->menu=array(
	array('label'=>'Create AgeRange', 'url'=>array('create')),
	array('label'=>'Manage AgeRange', 'url'=>array('admin')),
);
?>

<h1>Age Ranges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
