<?php
/* @var $this LeavereasonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Leavereasons',
);

$this->menu=array(
	array('label'=>'Create Leavereason', 'url'=>array('create')),
	array('label'=>'Manage Leavereason', 'url'=>array('admin')),
);
?>

<h1>Leavereasons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
