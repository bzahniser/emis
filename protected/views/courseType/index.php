<?php
/* @var $this CourseTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Course Types',
);

$this->menu=array(
	array('label'=>'Create CourseType', 'url'=>array('create')),
	array('label'=>'Manage CourseType', 'url'=>array('admin')),
);
?>

<h1>Course Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
