<?php
/* @var $this ProspectBenfeciaryController */
/* @var $model ProspectBenfeciary */

$this->breadcrumbs=array(
	'Prospect Benfeciaries'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Benfeciary', 'url'=>array('index')),
	array('label'=>'Create Benfeciary', 'url'=>array('create')),
	array('label'=>'Update Benfeciary', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Benfeciary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Benfeciary', 'url'=>array('admin')),
);
?>

<h1>View ProspectBenfeciary #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'Name',
		'LastName',
		'FullName',
		'ArabicName',
		'ArabicLastName',
		'ArabicFullName',
		'documentType.TypeName',
		'DocumentId',
		'Gender',
		'BirthDate',
		'PhoneNumber',
		'Whatsup',
		'satuts.Name',
		'FatherName',
		'currentCountry.CountryName',
		'currentCity.CityName',
		'originalCountry.CountryName',
		'originalCity.CityName',
		'visitReason.Name',
		'action.Name',
		'Desc',
		'Active',
		'Created',
		
		'Updated',
		
	),
)); ?>
