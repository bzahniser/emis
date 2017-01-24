<?php
/* @var $this LevelSubjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Level Subjects',
);

$this->menu=array(
	array('label'=>'Courses', 'url'=>array('Course/admin')),
	array('label'=>'Create Course', 'url'=>array('Course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('Level/create')),
        array('label'=>'Level Subject', 'url'=>array('Levelsubject/admin')),
        array('label'=>'Add Level Subject', 'url'=>array('LevelSubject/create')),
        array('label'=>'Level Exam', 'url'=>array('LevelExam/admin')),
        array('label'=>'Add Level Exam', 'url'=>array('LevelExam/create')),
);
?>

<h1>Level Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
