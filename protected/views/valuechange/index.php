<?php
/* @var $this ValuechangeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Valuechanges',
);

$this->menu=array(
	array('label'=>'Create Valuechange', 'url'=>array('create')),
	array('label'=>'Manage Valuechange', 'url'=>array('admin')),
);
?>

<h1>Valuechanges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
