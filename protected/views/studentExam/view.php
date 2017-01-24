<?php
/* @var $this StudentExamController */
/* @var $model StudentExam */

$this->breadcrumbs=array(
	'Student Exams'=>array('admin'),
	$model->ID,
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
        array('label'=>'Exams', 'url'=>array('StudentExam/admin')),
        array('label'=>'Enter Scores', 'url'=>array('Studentexam/ExamSessionSelect')),
);
?>

<h1>View StudentExam #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'ID',
		'student.FullName',
	
		'course.CourseName',
		'level.LevelName',
		'cycle.CycleName',
		'subject.SubjectName',
		'exam.ExamName',
	
		'StudentScore',
		'ExamDate',
		'ExamTime',
		'country.CountryName',
		'city.CityName',
		'center.CenterName',
		'TotalScore',
		'PassingScore',
		'Pre',
		'Post',
		'Mid',
		'Active',
		
	),
)); ?>
