<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('admin'),
	'Create',
);

$this->menu=array(
	
        array('label'=>'Courses', 'url'=>array('admin')),
	array('label'=>'Create Course', 'url'=>array('create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),

);
?>

<h1>Create Course</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>