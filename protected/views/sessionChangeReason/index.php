<?php
/* @var $this SessionChangeReasonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Session Change Reasons',
);

$this->menu=array(
	array('label'=>'Create SessionChangeReason', 'url'=>array('create')),
	array('label'=>'Manage SessionChangeReason', 'url'=>array('admin')),
);
?>

<h1>Session Change Reasons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
