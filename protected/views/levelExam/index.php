<?php
/* @var $this LevelExamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Level Exams',
);

$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('course/admin')),
	array('label'=>'Create Course', 'url'=>array('course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),
		array('label'=>'Add Exam To Level', 'url'=>array('create')),
);
?>

<h1>Level Exams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
