<?php
/* @var $this CycleEnrolmentController */
/* @var $model CycleEnrolment */

$this->breadcrumbs=array(
	'Cycle Enrolments'=>array('admin'),
	$model->EnrolmentID,
);

$this->menu=array(
	array('label'=>'Students', 'url'=>array('Student/admin')),
	array('label'=>'Add Student', 'url'=>array('Student/create')),
        array('label'=>'Leave', 'url'=>array('Leave/admin')),
        array('label'=>'New Leave', 'url'=>array('Leave/create')),
        array('label'=>'Enrollment', 'url'=>array('CycleEnrolment/admin')),
        array('label'=>'Enrol', 'url'=>array('CycleEnrolment/create')),
        array('label'=>'Waiting List', 'url'=>array('Waiting/admin')),
        array('label'=>'Add to Waiting', 'url'=>array('Waiting/create')),
        array('label'=>'Attendance', 'url'=>array('Attendance/admin')),
        array('label'=>'Session Attendance', 'url'=>array('Attendance/AttendanceSessionSelect')),
);
?>

<h1>View CycleEnrolment #<?php echo $model->EnrolmentID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'EnrolmentID',
		'student.FullName',
		'cycle.CycleName',
		'course.CourseName',
		'level.LevelName',
		'Transportation',
                'WaitingID',
                'withdrawReason.ReasonName',
		'Withdrawl',
		'WithdrawlDate',
		'WithdrawlUpdate',
		'WithdrawlUpdatedBy',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
