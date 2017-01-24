<?php
/* @var $this AttendanceController */
/* @var $model Attendance */

$this->breadcrumbs=array(
	'Attendances'=>array('admin'),
	$model->AttendanceID,
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

<h1>View Attendance #<?php echo $model->AttendanceID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'AttendanceID',
                'program.ProgramName',	
                'student.FullName',
		'course.CourseName',
		'level.LevelName',
		'cycle.CycleName',
                'AttendanceDate',
                'facilitator.FacilitatorName',
		'Present',
		'Absent',
		'SessionID',
		'EnrolmentID',
		'Active',
	),
)); ?>
