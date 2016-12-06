<?php
/* @var $this CourseGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Course Groups',
);

$this->menu=array(
	array('label'=>'Create CourseGroup', 'url'=>array('create')),
	array('label'=>'Manage CourseGroup', 'url'=>array('admin')),
);
?>

<h1>Course Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
