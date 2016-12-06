<?php
/* @var $this UserMenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Menus',
);

$this->menu=array(
	array('label'=>'Create UserMenu', 'url'=>array('create')),
	array('label'=>'Manage UserMenu', 'url'=>array('admin')),
);
?>

<h1>User Menus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
