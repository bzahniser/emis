<?php
/* @var $this RecpActionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recp Actions',
);

$this->menu=array(
	array('label'=>'Create RecpAction', 'url'=>array('create')),
	array('label'=>'Manage RecpAction', 'url'=>array('admin')),
);
?>

<h1>Recp Actions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
