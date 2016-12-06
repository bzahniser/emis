<?php
/* @var $this CycleController */
/* @var $model Cycle */


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

<h1> Cycle #<?php echo $model->CycleName; ?></h1>

        

<?php

$eventArray = Yii::app()->db->createCommand()
                                                    ->select('*')
                                                    ->from('v_Session_time_table')
                                                    ->where('CycleID=:id1', array(':id1'=>$model->CycleID))
                                                    ->queryAll();
$Con='CycleID='.$model->CycleID;

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Info'=>$this->renderPartial('partialView1',array('model'=>$model,),true),
        'Enrollment'=>$this->renderPartial('//cycleenrolment/StudentDetails',array('model'=>$model,),true),
        'Exams'=>$this->renderPartial('//cycleexam/examDetails',array('model'=>$model,'Con'=>$Con),true),
        'Score'=>$this->renderPartial('//studentexam/CycleExamDetail',array('model'=>$model,'CycleID'=>$model->CycleID),true),
        'Subjects'=>$this->renderPartial('//cyclesubject/subjectDetails',array('model'=>$model,),true),
        'Time Table'=>$this->renderPartial('TimeTable',array('eventArray'=>$eventArray,),true),
    ),

    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));