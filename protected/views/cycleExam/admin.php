<?php
/* @var $this CycleExamController */
/* @var $model CycleExam */

$this->breadcrumbs=array(
	'Cycle Exams'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Cycles', 'url'=>array('Cycle/admin')),
	array('label'=>'Start New Cycle', 'url'=>array('Cycle/create')),
        array('label'=>'Cycle Exam', 'url'=>array('CycleExam/admin')),
        array('label'=>'Add Cycle Exam', 'url'=>array('CycleExam/create')),
        array('label'=>'Cycle Subject', 'url'=>array('CycleSubject/admin')),
        array('label'=>'Add Cycle Subject', 'url'=>array('CycleSubject/create')),
        array('label'=>'Time Table', 'url'=>array('CycleSession/admin')),
        array('label'=>'New Session', 'url'=>array('CycleSession/create')),
        array('label'=>'Enrollment', 'url'=>array('Cycleenrolment/admin')),
        array('label'=>'New Enrollment', 'url'=>array('Cycleenrolment/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cycle-exam-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cycle Exams</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cycle-exam-grid',
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
                        'name'=>'CycleID',
                        //'filter'=>CHtml::listData(level::model()->findAll(), 'LevelID', 'LevelName'),
                        'value'=>'$data->cycle ? $data->cycle->CycleName: "-"'
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
		'ExamID',
		'Pre',
		'Post',
		'Mid',
		'Score',
		'PassingScore',
		'PassingRequired',
		'LevelExamID',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view} {inactive} {ative} {update}',
                        'buttons'=>array
                        (
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("CycleExam/InActivate", array("id"=>$data->ID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("CycleExam/Activate", array("id"=>$data->ID))',
                                'visible'=>'$data->Active==0',
                            ),
                        ),
		),
	),
)); ?>
