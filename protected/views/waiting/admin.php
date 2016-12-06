<?php
/* @var $this WaitingController */
/* @var $model Waiting */

$this->breadcrumbs=array(
	'Waitings'=>array('admin'),
	'Manage',
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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#waiting-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Waitings</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'waiting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                'WaitingID',
		array(
                        'name'=>'StudentID',
                        //'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->student ? $data->student->FullName: "-"'
                ),
		array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->program ? $data->program->ProgramName: "-"'
                ),
                array(
                        'name'=>'CourseID',
                        'filter'=>CHtml::listData(course::model()->findAll(), 'CourseID', 'CourseName'),
                        'value'=>'$data->course ? $data->course->CourseName: "-"'
                ),
		
                array(
                        'name'=>'LevelID',
                        'filter'=>CHtml::listData(level::model()->findAll(), 'LevelID', 'LevelName'),
                        'value'=>'$data->level ? $data->level->LevelName: "-"'
                ),
                
		'Enrolled',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view} {inactive} {ative} {update}',
                        'buttons'=>array
                        (
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("Waiting/InActivate", array("id"=>$data->WaitingID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Waiting/Activate", array("id"=>$data->WaitingID))',
                                'visible'=>'$data->Active==0',
                            ),
                           
                        ),
		),
	),
)); ?>
