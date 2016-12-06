<?php
/* @var $this FacilitatorController */
/* @var $model Facilitator */

$this->breadcrumbs=array(
	'Facilitators'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Facilitator', 'url'=>array('index')),
	array('label'=>'Create Facilitator', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#facilitator-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Facilitators</h1>

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
	'id'=>'facilitator-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                        'name'=>'ProgramID',
                        'filter'=>CHtml::listData(program::model()->findAll(), 'ProgramID', 'ProgramName'),
                        'value'=>'$data->program ? $data->program->ProgramName: "-"'
                ),
		'FacilitatorID',
		'FacilitatorFullName',
		'BirthDate',
                array(
                        'name'=>'IsMale',
                        'filter'=>CHtml::listData(gender::model()->findAll(), 'GenderID', 'GenderName'),
                        'value'=>'$data->gender ? $data->gender->GenderName: "-"'
                ),
                array(
                        'name'=>'CityID',
                        'filter'=>CHtml::listData(city::model()->findAll(), 'CityID', 'CityName'),
                        'value'=>'$data->city ? $data->city->CityName: "-"'
                ),
                'Active',
		/*
		'EducationLevel',
		'DocumentTypeID',
		'DocumentID',
		'IsMale',
		'CountryID',
		'CityID',
		'StartDate',
		'EndDate',
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
                                'url'=>'Yii::app()->createUrl("Facilitator/InActivate", array("id"=>$data->FacilitatorID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Facilitator/Activate", array("id"=>$data->FacilitatorID))',
                                'visible'=>'$data->Active==0',
                            ),
                        ),
		),
	),
)); ?>
