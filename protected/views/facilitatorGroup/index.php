<?php
/* @var $this FacilitatorGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facilitator Groups',
);

$this->menu=array(
	array('label'=>'Create FacilitatorGroup', 'url'=>array('create')),
	array('label'=>'Manage FacilitatorGroup', 'url'=>array('admin')),
);
?>

<h1>Facilitator Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
