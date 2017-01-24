<?php
/* @var $this LevelExamController */
/* @var $model LevelExam */

$this->breadcrumbs=array(
	'Level Exams'=>array('admin'),
	'Manage',
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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#level-exam-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Level Exams</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'level-exam-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(Program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->program ? $data->program->ProgramName: "-"'
                ),
		'ID',
		array(
                        'name'=>'CourseID',
                        //'filter'=>CHtml::listData(course::model()->findAll(), 'CourseID', 'CourseName'),
                        'value'=>'$data->course ? $data->course->CourseName: "-"'
                ),
		array(
                        'name'=>'LevelID',
                        //'filter'=>CHtml::listData(level::model()->findAll(), 'LevelID', 'LevelName'),
                        'value'=>'$data->level ? $data->level->LevelName: "-"'
                ),
		array(
                        'name'=>'SubjectID',
                        'filter'=>CHtml::listData(Subject::model()->findAll(), 'SubjectID', 'SubjectName'),
                        'value'=>'$data->subject ? $data->subject->SubjectName: "-"'
                ),
                array(
                        'name'=>'ExamID',
                        'filter'=>CHtml::listData(Exam::model()->findAll(), 'ExamID', 'ExamName'),
                        'value'=>'$data->exam ? $data->exam->ExamName: "-"'
                ),
		
		/*
		'Pre',
		'Post',
		'Mid',
		'Score',
		'PassingPercentage',
		'PassingRequired',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view} {update} {inactive} {ative}',
                        'buttons'=>array
                        (
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("levelexam/Activate", array("id"=>$data->ID))',
                                'visible'=>'$data->Active==0',
                            ),
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("levelsubject/InActivate", array("id"=>$data->ID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'viewdetail' => array
                            (
                                'label'=>'View',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonView.png',
                                'url'=>'Yii::app()->createUrl("levelexam/detailView", array("id"=>$data->ID))',
                                
                            ),
                        ),
		),
	),
)); ?>
