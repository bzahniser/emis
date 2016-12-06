<?php
/* @var $this FacilitatorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facilitators',
);

$this->menu=array(
	array('label'=>'Create Facilitator', 'url'=>array('create')),
	array('label'=>'Manage Facilitator', 'url'=>array('admin')),
);
?>

<h1>Facilitators</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
