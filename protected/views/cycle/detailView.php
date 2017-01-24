<?php
/* @var $this CycleController */
/* @var $model Cycle */


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

<h1> Cycle #<?php echo $model->CycleName; ?></h1>

        

<?php

$eventArray = Yii::app()->db->createCommand()
            ->select('*')
            ->from('v_session_time_table')
            ->where('CycleID=:id1', array(':id1'=>$model->CycleID))
            ->queryAll();
$Con='CycleID='.$model->CycleID;

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Info'=>$this->renderPartial('partialView1',array('model'=>$model,),true),
        'Enrollment'=>$this->renderPartial('//cycleEnrolment/StudentDetails',array('model'=>$model,),true),
        'Exams'=>$this->renderPartial('//cycleExam/examDetails',array('model'=>$model,'Con'=>$Con),true),
        'Score'=>$this->renderPartial('//studentExam/CycleExamDetail',array('model'=>$model,'CycleID'=>$model->CycleID),true),
        'Subjects'=>$this->renderPartial('//cycleSubject/subjectDetails',array('model'=>$model,),true),
        'Time Table'=>$this->renderPartial('TimeTable',array('eventArray'=>$eventArray,),true),
    ),

    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));