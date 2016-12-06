

<h1>Level #<?php echo $model->LevelName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
                'course.CourseName',
		
		'LevelName',
		'LevelDescription',
		
		'LevelCertification',
		'range.RangeName',
	
		'NumberOfHours',
		'coordinator.CoordinatorFullName',
		'Sequence',
		'Active',
		
	),
)); ?>
