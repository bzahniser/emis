<?php
/* @var $this LevelSubjectController */
/* @var $model LevelSubject */

$this->breadcrumbs=array(
	'Level Subjects'=>array('admin'),
	$model->ID,
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

<h1>View LevelSubject #</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'ID',
		'course.CourseName',
		'level.LevelName',
		'subject.SubjectName',
		'SubjectWieght',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
