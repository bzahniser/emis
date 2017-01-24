<?php
/* @var $this CycleSubjectController */
/* @var $model CycleSubject */

$this->breadcrumbs=array(
	'Cycle Subjects'=>array('admin'),
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

<h1>View CycleSubject #</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'ID',
		'program.ProgramName',
		'course.CourseName',
		'level.LevelName',
                'cycle.CycleName',
		'subject.SubjectName',
		'LevelSubjectID',
		'facilitator.FacilitatorFullName',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
                'AttendancePerSubject',
	),
)); ?>
