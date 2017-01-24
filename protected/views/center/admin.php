<?php
/* @var $this CenterController */
/* @var $model Center */

$this->breadcrumbs=array(
	'Centers'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Center', 'url'=>array('index')),
	array('label'=>'Create Center', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#center-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Centers</h1>

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
	'id'=>'center-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ProgramID',
		'CenterID',
		'CenterName',
		array(
                        'name'=>'CountryID',
                        'filter'=>CHtml::listData(Country::model()->findAll(), 'CountryID', 'CountryName'),
                        'value'=>'$data->country ? $data->country->CountryName: "-"'
                ),
		
                array(
                        'name'=>'CityID',
                        'filter'=>CHtml::listData(City::model()->findAll(), 'CityID', 'CityName'),
                        'value'=>'$data->city ? $data->city->CityName: "-"'
                ),
		
                array(
                        'name'=>'CoordinatorID',
                        //'filter'=>CHtml::listData(city::model()->findAll(), 'CoordinatorID', 'CoordinatorFullName'),
                        'value'=>'$data->coordinator ? $data->coordinator->CoordinatorFullName: "-"'
                ),
		/*
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
                                'url'=>'Yii::app()->createUrl("Center/InActivate", array("id"=>$data->CenterID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'Activate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("Center/Activate", array("id"=>$data->CenterID))',
                                'visible'=>'$data->Active==0',
                            ),
                        ),
		),
	),
)); ?>
