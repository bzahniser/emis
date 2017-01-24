<?php
/* @var $this CycleExamController */
/* @var $model CycleExam */

$this->breadcrumbs=array(
	'Cycle Exams'=>array('admin'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'Cycles', 'url'=>array('Cycle/admin')),
	array('label'=>'Start New Cycle', 'url'=>array('Cycle/create')),
        array('label'=>'Cycle Exam', 'url'=>array('CycleExam/admin')),
        array('label'=>'Add Cycle Exam', 'url'=>array('CycleExam/create')),
        array('label'=>'Cycle Subject', 'url'=>array('CycleSubject/admin')),
        array('label'=>'Add Cycle Subject', 'url'=>array('CycleSubject/create')),
        array('label'=>'Time Table', 'url'=>array('CycleSession/admin')),
        array('label'=>'New Session', 'url'=>array('CycleSession/create')),
        array('label'=>'Enrollment', 'url'=>array('Cycleenrolment/admin')),
        array('label'=>'New Enrollment', 'url'=>array('Cycleenrolment/create')),
);
?>

<h1>View CycleExam #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'ID',
		'course.CourseName',
		'level.LevelName',
		'subject.SubjectName',
		'cycle.CycleName',
		'exam.ExamName',
		'Pre',
		'Post',
		'Mid',
		'Score',
		'PassingScore',
		'PassingRequired',
		'LevelExamID',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
