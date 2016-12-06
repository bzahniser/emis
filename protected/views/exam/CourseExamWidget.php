

<h1>Exam #<?php echo $model->ExamName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		
		'ExamName',
		'ExamScore',
		'ExamPassingPercentage',
		'ExamCertification',
		'coordinator.CoordinatorFullName',
		'subject.SubjectName',
		'Active',
		
	),
)); ?>
