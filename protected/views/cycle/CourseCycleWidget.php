
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
	
		'CycleName',
		'CycleDescription',
                'program.ProgramName',
		'course.CourseName',
		'level.LevelName',
		'country.CountryName',
		'city.CityName',
		'center.CenterName',
		
		'StartDate',
		'EndDate',
		'age.RangeName',
		
		'NumberOfStudent',
		'NumberOfHours',
		'facilitator.FacilitatorFullName',
                'coordinator.CoordinatorFullName',
		'Certification',
		'Transportation',
                'CycleEnd',
                'CycleEndDate',
                'AttendancePerSubject',
		'Active',

	),
)); ?>
