<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs=array(
	'Exams'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Exam', 'url'=>array('index')),
	array('label'=>'Create Exam', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#exam-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Exams</h1>

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
	'id'=>'exam-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
                array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(Program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'program::Model()->FindByPk($data->ProgramID)->ProgramName',
                ),
		'ExamID',
		'ExamName',
		'ExamScore',
		'ExamPassingPercentage',
		'ExamCertification',
                array( 'name'=>'SubjectID', 'value'=>'$data->subject ? $data->subject->SubjectName: "-"' ),
		/*
		'CoordinatorID',
		'SubjectID',
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
                                'url'=>'Yii::app()->createUrl("Exam/InActivate", array("id"=>$data->ExamID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Exam/Activate", array("id"=>$data->ExamID))',
                                'visible'=>'$data->Active==0',
                            ),
                        ),
		),
	),
)); ?>
