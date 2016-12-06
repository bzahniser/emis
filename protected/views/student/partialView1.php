
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'StudentID',
		'Name',
		'LastName',
		
	
		'ArabicFullName',
		'documentType.TypeName',
		'DocumentId',
                
		'gender.GenderName',
		'BirthDate',
		
		'PhoneNumber',
		'Whatsup',
		'medicalStatus.StatusName',
		'houseHeadRelation.RelationName',
		
		'RegisteredinEducation',
		'LastGradeServed',
                'OutOfSchool',
		'NumberOfPersons',
                
		'BenefitFromIRC',
                'BenfitIRCEdu',
		'MediaApproval',
		
		'Active',
                'OldID'
		
	),
)); ?>
