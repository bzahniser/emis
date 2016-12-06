<?php
/* @var $this StudentController */
/* @var $model Student */


$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('course/admin')),
	array('label'=>'Create Course', 'url'=>array('course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),
);
?>

<h1> Student #<?php echo $model->CourseName; ?></h1>

<?php
Yii::app()->user->setState('CourseID', $model->CourseID);
$this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=>array(
        'Course'=>$this->renderPartial('partialView1',array('model'=>$model,),true),
        'Level'=>$this->renderPartial('CourseLevels',array('CourseID'=>$model->CourseID,),true),
        'Cycle'=>$this->renderPartial('CourseCycles',array('CourseID'=>$model->CourseID,),true),
        
    ),

    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));