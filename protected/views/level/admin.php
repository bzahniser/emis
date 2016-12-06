<?php
/* @var $this LevelController */
/* @var $model Level */

$this->breadcrumbs=array(
	'Levels'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Courses', 'url'=>array('course/admin')),
	array('label'=>'Create Course', 'url'=>array('course/create')),
        array('label'=>'Levels', 'url'=>array('Level/admin')),
        array('label'=>'Create Level', 'url'=>array('level/create')),
        array('label'=>'Level Subject', 'url'=>array('levelsubject/admin')),
        array('label'=>'Add Level Subject', 'url'=>array('levelsubject/create')),
        array('label'=>'Level Exam', 'url'=>array('levelexam/admin')),
        array('label'=>'Add Level Exam', 'url'=>array('levelexam/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#level-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Levels</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'level-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array( 
			'name'=>'ProgramID', 
			'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'), 
			'value'=>'$data->program ? $data->program->ProgramName: "-"' 
			),
		array( 
			'name'=>'CourseID', 
			'filter'=>CHtml::listData(course::model()->findAll(), 
			'CourseID', 'CourseName'), 'value'=>'$data->course ? $data->course->CourseName: "-"' 
			),
		'LevelName',
		'RangeID',
                'Sequence',
                
		/*
		'RangeID',
		'AgeFlexability',
		'NumberOfHours',
		'CoordinatorID',
		'Sequence',
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
                                'url'=>'Yii::app()->createUrl("Level/InActivate", array("id"=>$data->LevelID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Level/Activate", array("id"=>$data->LevelID))',
                                'visible'=>'$data->Active==0',
                            ),
                        ),
                           
		),
	),
)); ?>
