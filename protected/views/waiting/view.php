<?php
/* @var $this WaitingController */
/* @var $model Waiting */

$this->breadcrumbs=array(
	'Waitings'=>array('admin'),
	$model->WaitingID,
);

$this->menu=array(
	 array('label'=>'Students', 'url'=>array('student/admin')),
	array('label'=>'Add Student', 'url'=>array('student/create')),
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

<h1>View Waiting #<?php echo $model->WaitingID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		
		
		'student.FullName',
		
		'course.CourseName',
		'level.LevelName',
		'Enrolled',
		'EnrolmentDate',
		'CycleStartDate',
		'InformedOfCycleOpening',
		'Closed',
		'CloseDate',
		'ClosedBy',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
