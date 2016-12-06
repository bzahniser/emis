<?php
/* @var $this CycleController */
/* @var $model Cycle */

$this->breadcrumbs=array(
	'Cycles'=>array('admin'),
	$model->CycleID=>array('view','id'=>$model->CycleID),
	'Update',
);

$this->menu=array(
		array('label'=>'Cycles', 'url'=>array('cycle/admin')),
	array('label'=>'Start New Cycle', 'url'=>array('cycle/create')),
        array('label'=>'Cycle Exam', 'url'=>array('cycleexam/admin')),
        array('label'=>'Add Cycle Exam', 'url'=>array('cycleexam/create')),
        array('label'=>'Cycle Subject', 'url'=>array('cyclesubject/admin')),
        array('label'=>'Add Cycle Subject', 'url'=>array('cyclesubject/create')),
        array('label'=>'Time Table', 'url'=>array('CycleSession/admin')),
        array('label'=>'New Session', 'url'=>array('CycleSession/create')),
        array('label'=>'Enrollment', 'url'=>array('Cycleenrolment/admin')),
        array('label'=>'New Enrollment', 'url'=>array('Cycleenrolment/create')),
);
?>

<h1>Update Cycle <?php echo $model->CycleID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>