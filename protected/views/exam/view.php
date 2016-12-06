<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs=array(
	'Exams'=>array('admin'),
	$model->ExamID,
);

$this->menu=array(
	array('label'=>'List Exam', 'url'=>array('index')),
	array('label'=>'Create Exam', 'url'=>array('create')),
	array('label'=>'Update Exam', 'url'=>array('update', 'id'=>$model->ExamID)),
	array('label'=>'Delete Exam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ExamID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Exam', 'url'=>array('admin')),
);
?>

<h1>Exam #<?php echo $model->ExamName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'ExamID',
		'ExamName',
		'ExamScore',
		'ExamPassingPercentage',
		'ExamCertification',
		'coordinator.CoordinatorFullName',
		'subject.SubjectName',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
