<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'program.ProgramName',
		'CourseID',
		'CourseCode',
		'CourseName',
		'CourseDescription',
		'Provider',
		'IsSchool',
		'coordinator.CoordinatorName',
		'courseType.CourseTypeName',
		'courseGroup.GroupName',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>