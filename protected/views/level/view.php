<?php
/* @var $this LevelController */
/* @var $model Level */

$this->breadcrumbs=array(
	'Levels'=>array('admin'),
	$model->LevelID,
);


	$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('Course/admin')),
	array('label'=>'Create Course', 'url'=>array('Course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('Level/create')),
        array('label'=>'Level Subject', 'url'=>array('Levelsubject/admin')),
        array('label'=>'Add Level Subject', 'url'=>array('LevelSubject/create')),
        array('label'=>'Level Exam', 'url'=>array('LevelExam/admin')),
        array('label'=>'Add Level Exam', 'url'=>array('LevelExam/create')),

	array('label'=>'Update Level', 'url'=>array('update', 'id'=>$model->LevelID)),

);
?>

<h1>Level #<?php echo $model->LevelName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
                'course.CourseName',
		'LevelID',
		'LevelName',
		'LevelDescription',
		
		'LevelCertification',
		'range.RangeName',
		'AgeFlexability',
		'NumberOfHours',
		'coordinator.CoordinatorFullName',
		'Sequence',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
