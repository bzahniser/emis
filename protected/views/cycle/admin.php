<?php
/* @var $this CycleController */
/* @var $model Cycle */
$this->breadcrumbs=array(
	'Cycles'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Cycles', 'url'=>array('Cycle/admin')),
	array('label'=>'Start New Cycle', 'url'=>array('Cycle/create')),
        array('label'=>'Cycle Exam', 'url'=>array('Cycleexam/admin')),
        array('label'=>'Add Cycle Exam', 'url'=>array('Cycleexam/create')),
        array('label'=>'Cycle Subject', 'url'=>array('Cyclesubject/admin')),
        array('label'=>'Add Cycle Subject', 'url'=>array('Cyclesubject/create')),
        array('label'=>'Time Table', 'url'=>array('CycleSession/admin')),
        array('label'=>'New Session', 'url'=>array('CycleSession/create')),
        array('label'=>'Enrollment', 'url'=>array('CycleEnrolment/admin')),
        array('label'=>'New Enrollment', 'url'=>array('CycleEnrolment/create')),
        array('label'=>'Waiting', 'url'=>array('Waiting/admin')),
        array('label'=>'New Waiting', 'url'=>array('Waiting/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cycle-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Cycles</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cycle-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
                array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(Program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->program ? $data->program->ProgramName: "-"'
                ),
		
		array(
                        'name'=>'CourseID',
                        //'filter'=>CHtml::listData(Course::model()->findAll(), 'CourseID', 'CourseName'),
                        'value'=>'$data->course ? $data->course->CourseName: "-"'
                ),
		array(
                        'name'=>'LevelID',
                        //'filter'=>CHtml::listData(Level::model()->findAll(), 'LevelID', 'LevelName'),
                        'value'=>'$data->level ? $data->level->LevelName: "-"'
                ),
		
		'CycleID',
		'CycleName',
                'CycleEnd',
		
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{dview} {generate} {end} {inactive} {ative} {update} {print}',
                        'buttons'=>array
                        (
                            'end' => array
                            (
                                'label'=>'End Cycle',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonEnd.png',
                                'url'=>'Yii::app()->createUrl("Cycle/endcycle", array("id"=>$data->CycleID))',
                                'visible'=> '$data->CycleEnd==0'
                            ),
                            'dview' => array
                            (
                                'label'=>'View',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonView.png',
                                'url'=>'Yii::app()->createUrl("Cycle/detailView", array("id"=>$data->CycleID))',
                            ),
                            'generate' => array
                            (
                                'label'=>'Generate Time Table',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonTimeTable.png',
                                'url'=>'Yii::app()->createUrl("CycleSession/WeekTemplate", array("id"=>$data->CycleID))',
                                'visible'=> '$data->CycleEnd==0'
                            ),
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("Cycle/InActivate", array("id"=>$data->CycleID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Cycle/Activate", array("id"=>$data->CycleID))',
                                'visible'=>'$data->CycleEnd==0 and $data->Active==0 ',
                            ),
                            'print' => array
                            (
                                'label'=>'Print Attendance',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonAttendance.png',
                                'url'=>'Yii::app()->createUrl("cycle/PrintAttendance", array("id"=>$data->CycleID))',
                            ),
                        ),
		),
	),
)); ?>
