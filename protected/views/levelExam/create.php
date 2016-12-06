<?php
/* @var $this LevelExamController */
/* @var $model LevelExam */

$this->breadcrumbs=array(
	'Level Exams'=>array('admin'),
	'Create',
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

<h1>Create LevelExam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>