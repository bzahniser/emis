<?php
/* @var $this ProspectBenfeciaryController */
/* @var $model ProspectBenfeciary */

$this->breadcrumbs=array(
	'Prospect Benfeciaries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Benfeciary', 'url'=>array('index')),
	array('label'=>'Add Benfeciary', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#prospect-benfeciary-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Prospect Benfeciaries</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prospect-benfeciary-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

            'FullName',
            'ArabicFullName',
            'DocumentId',
            'BirthDate',
            'PhoneNumber',
            
            
            array(
                'name'=>'VisitReasonID',
                'filter'=>CHtml::listData(visitReason::model()->findAll(), 'VisitReasonID', 'Name'),
                'value'=>'$data->visitReason ? $data->visitReason->Name: "-"'
            ),
            array(
                'name'=>'ActionID',
                'filter'=>CHtml::listData(recpAction::model()->findAll(), 'ActionID', 'Name'),
                'value'=>'$data->action ? $data->action->Name: "-"'
            ),
            /*
		
		'DocumentTypeId',
		
		'Gender',
		
		
		'Whatsup',
		'SatutsID',
		'FatherName',
		'CurrentCountryID',
		'CurrentCityID',
		'OriginalCountryID',
		'OriginalCityID',
		
		
		'Desc',
		'Active',
		'Created',
		'CreatedBy',
		'Updated',
		'UpdatedBy',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
