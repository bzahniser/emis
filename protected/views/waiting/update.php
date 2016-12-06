<?php
/* @var $this WaitingController */
/* @var $model Waiting */

$this->breadcrumbs=array(
	'Waitings'=>array('admin'),
	$model->WaitingID=>array('view','id'=>$model->WaitingID),
	'Update',
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

<h1>Update Waiting <?php echo $model->WaitingID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>