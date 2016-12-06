<?php
/* @var $this MedicalStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Medical Statuses',
);

$this->menu=array(
	array('label'=>'Create MedicalStatus', 'url'=>array('create')),
	array('label'=>'Manage MedicalStatus', 'url'=>array('admin')),
);
?>

<h1>Medical Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
