<?php
/* @var $this StudentController */
/* @var $model Student */


$this->menu=array(
	 array('label'=>'Students', 'url'=>array('student/admin')),
	array('label'=>'Add Student', 'url'=>array('student/create')),
        array('label'=>'Leave', 'url'=>array('Leave/admin')),
        array('label'=>'New Leave', 'url'=>array('Leave/create')),
        array('label'=>'Enrollment', 'url'=>array('CycleEnrolment/admin')),
        array('label'=>'Enrol', 'url'=>array('CycleEnrolment/create')),
        array('label'=>'Waiting List', 'url'=>array('Waiting/admin')),
        array('label'=>'Add to Waiting', 'url'=>array('Waiting/create')),
        array('label'=>'Attendance', 'url'=>array('Attendance/admin')),
        array('label'=>'Session Attendance', 'url'=>array('Attendance/AttendanceSessionSelect')),
);
?>

<h1> Student #<?php echo $model->FullName; ?></h1>

<?php

$eventArray = Yii::app()->db->createCommand()
                                                    ->select('*')
                                                    ->from('V_Student_Attendance')
                                                    ->where('StudentID=:id1', array(':id1'=>$model->StudentID))
                                                    ->queryAll();
  

$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Student'=>$this->renderPartial('partialView1',array('model'=>$model,),true),
        'Parent'=>$this->renderPartial('partialViewParent',array('model'=>$model,),true),
        'Geo Info'=>$this->renderPartial('GeoLocation',array('model'=>$model,),true),
        'Cycles'=>$this->renderPartial('//cycleenrolment/StudentDetails',array('model'=>$model,),true),
        'Exams'=>$this->renderPartial('//studentexam/StudentExamDetail',array('studentid'=>$model->StudentID,),true),
        'Time Table'=>$this->renderPartial('TimeTable',array('eventArray'=>$eventArray,),true),
    ),

    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));