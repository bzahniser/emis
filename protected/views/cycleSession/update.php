<?php
/* @var $this CycleSessionController */
/* @var $model CycleSession */

$this->breadcrumbs=array(
	'Cycle Sessions'=>array('admin'),
	$model->SessionID=>array('view','id'=>$model->SessionID),
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

<h1>Update CycleSession <?php echo $model->SessionID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>