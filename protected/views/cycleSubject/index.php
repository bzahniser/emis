<?php
/* @var $this CycleSubjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cycle Subjects',
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

<h1>Cycle Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
