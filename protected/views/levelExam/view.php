<?php
/* @var $this LevelExamController */
/* @var $model LevelExam */

$this->breadcrumbs=array(
	'Level Exams'=>array('admin'),
	$model->ID,
);


	$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('course/admin')),
	array('label'=>'Create Course', 'url'=>array('course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),
		array('label'=>'Add Exam To Level', 'url'=>array('create')),

	array('label'=>'Update LevelExam', 'url'=>array('update', 'id'=>$model->ID)),
	
);
?>

<h1>LevelExam #</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'ID',
		'course.CourseName',
		'level.LevelName',
		'subject.SubjectName',
		'exam.ExamName',
		'Pre',
		'Post',
		'Mid',
		'Score',
		'PassingPercentage',
		'PassingRequired',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
