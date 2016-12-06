<?php
/* @var $this LevelController */
/* @var $model Level */

$this->breadcrumbs=array(
	'Levels'=>array('index'),
	$model->LevelID=>array('view','id'=>$model->LevelID),
	'Update',
);

$this->menu=array(
	
         array('label'=>'Courses', 'url'=>array('course/admin')),
	array('label'=>'Create Course', 'url'=>array('course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),
);
?>

<h1>Update Level <?php echo $model->LevelID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>