<?php
/* @var $this LeaveController */
/* @var $model Leave */

$this->breadcrumbs=array(
	'Leaves'=>array('admin'),
	$model->LeaveID,
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

<h1>View Leave #<?php echo $model->student->FullName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'student.FullName',
		'program.ProgramName',
                'course.CourseName',
                'level.LevelName',
		
		'LeaveName',
		'LeaveDateFrom',
                'LeaveDateTo',
		'reason.ReasonName',

		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
	),
)); ?>
