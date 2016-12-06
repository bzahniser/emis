
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
		'Room',
		'StartDate',
		'EndDate',
		'age.RangeName',
		'AgeFlexability',
		'NumberOfStudent',
		'NumberOfHours',
		'facilitator.FacilitatorFullName',
                'coordinator.CoordinatorFullName',
		'Certification',
		'Transportation',
                'CycleEnd',
                'CycleEndDate',
                'CycleEndTS',
                'CycleEndBy',
                'AttendancePerSubject',
		'Active',
		
	),
)); ?>
