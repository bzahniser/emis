<?php
/* @var $this CycleSessionController */
/* @var $model CycleSession */

$this->breadcrumbs=array(
	'Cycle Sessions'=>array('admin'),
	$model->SessionID=>array('view','id'=>$model->SessionID),
	'Update',
);

$this->menu=array(
	array('label'=>'Cycles', 'url'=>array('Cycle/admin')),
	array('label'=>'Start New Cycle', 'url'=>array('Cycle/create')),
        array('label'=>'Cycle Exam', 'url'=>array('CycleExam/admin')),
        array('label'=>'Add Cycle Exam', 'url'=>array('CycleExam/create')),
        array('label'=>'Cycle Subject', 'url'=>array('CycleSubject/admin')),
        array('label'=>'Add Cycle Subject', 'url'=>array('CycleSubject/create')),
        array('label'=>'Time Table', 'url'=>array('CycleSession/admin')),
        array('label'=>'New Session', 'url'=>array('CycleSession/create')),
        array('label'=>'Enrollment', 'url'=>array('CycleEnrolment/admin')),
        array('label'=>'New Enrollment', 'url'=>array('CycleEnrolment/create')),
);
?>

<h1>Update CycleSession <?php echo $model->SessionID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
