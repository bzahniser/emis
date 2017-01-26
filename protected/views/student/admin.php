<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('admin'),
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
        array('label'=>'Enter Scores', 'url'=>array('StudentExam/ExamSessionSelect')),
    
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Students</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(Program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->program ? $data->program->ProgramName: "-"'
                ),
		'StudentID',
		
		'FullName',
		'ArabicFullName',
                'BirthDate',
                'PhoneNumber',
		'DocumentId',
		/*
		'ArabicLastName',
		'ArabicFullName',
		'DocumentTypeId',
		'DocumentId',
		'RelationDID',
		'FatherIsAlive',
		
		'MotherIsAlive',
		'RegisteredinEducation',
		'LastGradeServed',
		'IsMale',
		'BirthDate',
		'BirthCountryID',
		'PhoneNumber',
		'Whatsup',
		'MedicalStatusID',
		'HouseHeadRelationID',
		'NumberOfPersons',
		'CurrentCountryID',
		'CurrentCityID',
		'OriginalCountryID',
		'OriginalCityID',
		'BenefitFromIRC',
		'MediaApproval',
		'RgistrationCountryID',
		'RegistrationCityID',
		'RegistrationEmpID',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{viewdetail} {TimeTable} {inactive} {ative} {update}',
                        'buttons'=>array
                        (
                            'viewdetail' => array
                            (
                                'label'=>'View',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonView.png',
                                'url'=>'Yii::app()->createUrl("Student/detailView", array("id"=>$data->StudentID))',
                                
                            ),
                            'TimeTable' => array
                            (
                                'label'=>'Time Table',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonTimeTable.png',
                                'url'=>'Yii::app()->createUrl("Student/TimeTable", array("id"=>$data->StudentID))',
                                
                            ),
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("Student/InActivate", array("id"=>$data->StudentID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Student/Activate", array("id"=>$data->StudentID))',
                                'visible'=>'$data->Active==0',
                            ),
                        ),
		),
	),
)); ?>
