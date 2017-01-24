<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('admin')),
	array('label'=>'Create Course', 'url'=>array('create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('Level/create')),
        array('label'=>'Level Subject', 'url'=>array('LevelSubject/admin')),
        array('label'=>'Level Exam', 'url'=>array('LevelExam/admin')),
);
?>

<h1>Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
