<?php
/* @var $this FacilitatorController */
/* @var $model Facilitator */

$this->breadcrumbs=array(
	'Facilitators'=>array('index'),
	$model->FacilitatorID,
);

$this->menu=array(
	array('label'=>'List Facilitator', 'url'=>array('index')),
	array('label'=>'Create Facilitator', 'url'=>array('create')),
	array('label'=>'Update Facilitator', 'url'=>array('update', 'id'=>$model->FacilitatorID)),
	array('label'=>'Delete Facilitator', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->FacilitatorID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Facilitator', 'url'=>array('admin')),
);
?>

<h1>View Facilitator #<?php echo $model->FacilitatorID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'program.ProgramName',
		'FacilitatorID',
		'FacilitatorName',
		'FacilitatorLastName',
		'FacilitatorFullName',
		'BirthDate',
		'EducationLevel',
		'documentType.TypeName',
		'DocumentID',
		'gender.GenderName',
                'facilitatorGroup.GroupName',
                'HourPerDay',
                'HourPerMonth',
		'country.CountryName',
		'city.CityName',
		'StartDate',
		'EndDate',
                'PhoneNumber',
                'Whatsup',
		'Active',
		'Created',
		'createdBy.LoginName',
		'Updated',
		'updatedBy.LoginName',
	),
)); ?>
