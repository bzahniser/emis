<?php
/* @var $this CycleEnrolmentController */
/* @var $model CycleEnrolment */

$this->breadcrumbs=array(
	'Cycle Enrolments'=>array('admin'),
	$model->EnrolmentID=>array('view','id'=>$model->EnrolmentID),
	'Update',
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

<h1>Update CycleEnrolment <?php echo $model->EnrolmentID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>