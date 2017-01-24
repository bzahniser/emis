<?php
/* @var $this LevelExamController */
/* @var $model LevelExam */

$this->breadcrumbs=array(
	'Level Exams'=>array('admin'),
	'Create',
);

$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('Course/admin')),
	array('label'=>'Create Course', 'url'=>array('Course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('Level/create')),
        array('label'=>'Level Subject', 'url'=>array('Levelsubject/admin')),
        array('label'=>'Add Level Subject', 'url'=>array('LevelSubject/create')),
        array('label'=>'Level Exam', 'url'=>array('LevelExam/admin')),
        array('label'=>'Add Level Exam', 'url'=>array('LevelExam/create')),
);
?>

<h1>Create LevelExam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>