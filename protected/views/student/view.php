<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs=array(
	'Students'=>array('admin'),
	$model->Name,
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

<h1> Student #<?php echo $model->FullName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'StudentID',
		'Name',
		'LastName',
		'FullName',
		'ArabicName',
		'ArabicLastName',
		'ArabicFullName',
		'documentType.TypeName',
		'DocumentId',
                'houseHeadRelation.RelationName',
		'FatherIsAlive',
		'relationDID.FatherName',
		'MotherIsAlive',
                'relationDID.MotherFullName',
                'relationDID.ParentPhone',
                'relationDID.ParentPhone2',
                'familyRelation.RelationName',
		//'relationDID.documentType.DocumentTypeID',
                array(
                        'name'=>'DocumentTypeID',
                        'value'=> $model->relationDID->documentType->TypeName,
                ),
                'relationDID.DocumentID',
                'relationDID.RelativeName',
                'relationDID.RelativePhone',
            
		'RegisteredinEducation',
		'LastGradeServed',
                'OutOfSchool',
		'gender.GenderName',
		'BirthDate',
		'birthCountry.CountryName',
		'PhoneNumber',
		'Whatsup',
		'medicalStatus.StatusName',
		
		'NumberOfPersons',
		'currentCountry.CountryName',
		'currentCity.CityName',
		'originalCountry.CountryName',
		'originalCity.CityName',
		'BenefitFromIRC',
                'BenfitIRCEdu',
		'MediaApproval',
		
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
