<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('admin'),
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
	$('#course-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Courses</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
                array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->program ? $data->program->ProgramName: "-"'
                ),
		'CourseID',
		
		'CourseName',
		
                array(
                        'name'=>'CourseTypeID',
                        'filter'=>CHtml::listData(courseType::model()->findAll(), 'CourseTypeID', 'CourseTypeName'),
                        'value'=>'$data->courseType ? $data->courseType->CourseTypeName: "-"'
                ),
		
                array(
                        'name'=>'CourseGroupID',
                        'filter'=>CHtml::listData(courseGroup::model()->findAll(), 'GroupID', 'GroupName'),
                        'value'=>'$data->courseGroup ? $data->courseGroup->GroupName: "-"'
                ),
                'Active',
		/*
		'IsSchool',
		'CoordinatorID',
		'CourseTypeID',
		'CourseGroupID',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{viewdetail} {inactive} {ative} {update}',
                        'buttons'=>array
                        (
                            'inactive' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonInActivate.png',
                                'url'=>'Yii::app()->createUrl("Course/InActivate", array("id"=>$data->CourseID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Course/Activate", array("id"=>$data->CourseID))',
                                'visible'=>'$data->Active==0',
                            ),
                            'viewdetail' => array
                            (
                                'label'=>'View',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonView.png',
                                'url'=>'Yii::app()->createUrl("Course/detailView", array("id"=>$data->CourseID))',
                                
                            ),
                        ),
		),
	),
)); ?>
