<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('admin'),
	$model->CourseID,
);

$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('admin')),
	array('label'=>'Create Course', 'url'=>array('create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),

	array('label'=>'Update Course', 'url'=>array('update', 'id'=>$model->CourseID)),
	
);
?>

<h1>Course #<?php echo $model->CourseName; ?></h1>

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
