<?php
/* @var $this LevelSubjectController */
/* @var $model LevelSubject */

$this->breadcrumbs=array(
	'Level Subjects'=>array('admin'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Courses', 'url'=>array('course/admin')),
	array('label'=>'Create Course', 'url'=>array('course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
		array('label'=>'Add Level Subject', 'url'=>array('levelsubject/create')),
        array('label'=>'Update LevelSubject', 'url'=>array('update', 'id'=>$model->ID)),
		array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),
	

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
