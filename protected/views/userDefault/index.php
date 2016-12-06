<?php
/* @var $this UserDefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Defaults',
);

$this->menu=array(
	array('label'=>'Create UserDefault', 'url'=>array('create')),
	array('label'=>'Manage UserDefault', 'url'=>array('admin')),
);
?>

<h1>User Defaults</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
