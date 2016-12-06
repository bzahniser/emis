<?php
/* @var $this ProstatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prostatuses',
);

$this->menu=array(
	array('label'=>'Create Prostatus', 'url'=>array('create')),
	array('label'=>'Manage Prostatus', 'url'=>array('admin')),
);
?>

<h1>Prostatuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
