<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List City', 'url'=>array('index')),
	array('label'=>'Create City', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#city-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cities</h1>

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
	'id'=>'city-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'CityID',
		'CityName',
		array(
                        'name'=>'CountryID',
                        'filter'=>CHtml::listData(Country::model()->findAll(), 'CountryID', 'CountryName'),
                        'value'=>'country::Model()->FindByPk($data->CountryID)->CountryName',
                ),
		'Region',
		'Active',
		'Created',
		/*
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
                                'url'=>'Yii::app()->createUrl("City/InActivate", array("id"=>$data->CityID))',
                                'visible'=>'$data->Active==1',
                            ),
                            'ative' => array
                            (
                                'label'=>'InActivate',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttonActivate.png',
                                'url'=>'Yii::app()->createUrl("City/Activate", array("id"=>$data->CityID))',
                                'visible'=>'$data->Active==0',
                            ),
                        ),
		),
	),
)); ?>
