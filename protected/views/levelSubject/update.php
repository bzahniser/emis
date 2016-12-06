<?php
/* @var $this LevelSubjectController */
/* @var $model LevelSubject */

$this->breadcrumbs=array(
	'Level Subjects'=>array('admin'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
array('label'=>'Courses', 'url'=>array('course/admin')),
	array('label'=>'Create Course', 'url'=>array('course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
		array('label'=>'Add Level Subject', 'url'=>array('levelsubject/create')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),
);
?>

<h1>Update LevelSubject <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>