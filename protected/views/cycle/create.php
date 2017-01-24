<?php
/* @var $this CycleController */
/* @var $model Cycle */

$this->breadcrumbs=array(
	'Cycles'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Cycles', 'url'=>array('Cycle/admin')),
	array('label'=>'Start New Cycle', 'url'=>array('Cycle/create')),
        array('label'=>'Cycle Exam', 'url'=>array('CycleExam/admin')),
        array('label'=>'Add Cycle Exam', 'url'=>array('cycleExam/create')),
        array('label'=>'Cycle Subject', 'url'=>array('CycleSubject/admin')),
        array('label'=>'Add Cycle Subject', 'url'=>array('CycleSubject/create')),
        array('label'=>'Time Table', 'url'=>array('CycleSession/admin')),
        array('label'=>'New Session', 'url'=>array('CycleSession/create')),
        array('label'=>'Enrollment', 'url'=>array('CycleEnrolment/admin')),
        array('label'=>'New Enrollment', 'url'=>array('CycleEnrolment/create')),
);
?>

<h1>Create Cycle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>