<?php
/* @var $this CycleEnrolmentController */
/* @var $model CycleEnrolment */

$this->breadcrumbs=array(
	'Cycle Enrolments'=>array('admin'),
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
	$('#cycle-enrolment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cycle Enrolments</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cycle-enrolment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                        'name'=>'StudentID',
                        //'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->student ? $data->student->FullName: "-"'
                ),
                array(
                        'name'=>'student.ArabicFullName',
                        //'filter'=>CHtml::telField(),
                        'value'=>'$data->student ? $data->student->ArabicFullName: "-"'
                ),
		array(
                        'name'=>'student.PhoneNumber',
                        //'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->student ? $data->student->PhoneNumber: "-"'
                ),
                array(
                        'name'=>'CourseID',
                        'filter'=>CHtml::listData(Course::model()->findAll(), 'CourseID', 'CourseName'),
                        'value'=>'$data->course ? $data->course->CourseName: "-"'
                ),
		
                
                array(
                        'name'=>'CycleID',
                        //'filter'=>CHtml::listData(level::model()->findAll(), 'LevelID', 'LevelName'),
                        'value'=>'$data->cycle ? $data->cycle->CycleName: "-"'
                ),
		
		/*
		'WaitingID',
		'Transportation',
		'Withdrawl',
		'WithdrawlDate',
		'WithdrawlUpdate',
		'WithdrawlUpdatedBy',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view} {update} {withdraw} {certificate}',
                        'buttons'=>array
                        (
                            'withdraw' => array
                            (
                                'label'=>'Withdraw',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonEnd.png',
                                'url'=>'Yii::app()->createUrl("CycleEnrolment/withdraw", array("id"=>$data->EnrolmentID))',
                                'visible'=>'$data->Withdrawl==0',
                            ),
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("CycleEnrolment/InActivate", array("id"=>$data->EnrolmentID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("CycleEnrolment/Activate", array("id"=>$data->EnrolmentID))',
                                'visible'=>'$data->Active==0',
                            ),
                            'certificate' => array
                            (
                                'label'=>'Generate Certificate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonCertificat.png',
                                'url'=>'Yii::app()->createUrl("CycleEnrolment/GenerateCertificate", array("id"=>$data->EnrolmentID))',
                            ),
                        ),
		),
	),
)); ?>
