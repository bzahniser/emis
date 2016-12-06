<?php
/* @var $this StudentExamController */
/* @var $model StudentExam */

$this->breadcrumbs=array(
	'Student Exams'=>array('admin'),
	'Create',
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
        array('label'=>'Exams', 'url'=>array('studentexam/admin')),
        array('label'=>'Enter Scores', 'url'=>array('Studentexam/ExamSessionSelect')),
    
);
?>

<h1>Create StudentExam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>