<?php
/* @var $this AttendanceController */
/* @var $model Attendance */

$this->breadcrumbs=array(
	'Attendances'=>array('admin'),
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
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#attendance-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Attendances</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'attendance-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(Program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->program ? $data->program->ProgramName: "-"'
                ),
	
                array(
                        'name'=>'CourseID',
                        'filter'=>CHtml::listData(Course::model()->findAll(), 'CourseID', 'CourseName'),
                        'value'=>'$data->course ? $data->course->CourseName: "-"'
                ),
                
                array(
                        'name'=>'LevelID',
                        //'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->level ? $data->level->LevelName: "-"'
                ),
               
                array(
                        'name'=>'CycleID',
                        //'filter'=>CHtml::listData(program::model()->findAll(), 'CycleID', 'CycleName'),
                        'value'=>'$data->cycle ? $data->cycle->CycleName: "-"'
                ),
		array(
                        'name'=>'StudentID',
                        //'filter'=>CHtml::listData(student::model()->findAll(), 'StudentID', 'ProgramName'),
                        'value'=>'$data->student ? $data->student->FullName: "-"'
                ),
		'FacilitatorID',
		'Present',
		'AttendanceDate',
		/*
		
		
		'Absent',
		'SessionID',
		
		'UserID',
		'EnrolmentID',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view} {inactive} {ative} ',
                        'buttons'=>array
                        (
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("Attendance/InActivate", array("id"=>$data->AttendanceID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Attendance/Activate", array("id"=>$data->AttendanceID))',
                                'visible'=>'$data->Active==0',
                            ),
                           
                        ),
		),
	),
)); ?>
