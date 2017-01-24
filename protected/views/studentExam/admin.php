<?php
/* @var $this StudentExamController */
/* @var $model StudentExam */

$this->breadcrumbs=array(
	'Student Exams'=>array('admin'),
	'Manage',
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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-exam-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Student Exams</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-exam-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                        'name'=>'StudentID',
                        //'filter'=>CHtml::listData(course::model()->findAll(), 'CourseID', 'CourseName'),
                        'value'=>'$data->student ? $data->student->FullName: "-"'
                ),
                array(
                        'name'=>'CourseID',
                        //'filter'=>CHtml::listData(course::model()->findAll(), 'CourseID', 'CourseName'),
                        'value'=>'$data->course ? $data->course->CourseName: "-"'
                ),
		array(
                        'name'=>'LevelID',
                        //'filter'=>CHtml::listData(level::model()->findAll(), 'LevelID', 'LevelName'),
                        'value'=>'$data->level ? $data->level->LevelName: "-"'
                ),
                array(
                        'name'=>'CycleID',
                        //'filter'=>CHtml::listData(level::model()->findAll(), 'LevelID', 'LevelName'),
                        'value'=>'$data->cycle ? $data->cycle->CycleName: "-"'
                ),
		array(
                        'name'=>'ExamID',
                        'filter'=>CHtml::listData(Exam::model()->findAll(), 'ExamID', 'ExamName'),
                        'value'=>'$data->exam ? $data->exam->ExamName: "-"'
                ),
		'StudentScore',
	
		
		/*
		'CycleID',
		'SubjectID',
		'ExamID',
		'LevelExamID',
		'CycleExamID',
		'StudentScore',
		'ExamDate',
		'ExamTime',
		'CountryID',
		'CityID',
		'CenterID',
		'TotalScore',
		'PassingScore',
		'Pre',
		'Post',
		'Mid',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
