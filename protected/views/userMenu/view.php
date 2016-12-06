<?php
/* @var $this UserMenuController */
/* @var $model UserMenu */

$this->breadcrumbs=array(
	'User Menus'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List UserMenu', 'url'=>array('index')),
	array('label'=>'Create UserMenu', 'url'=>array('create')),
	array('label'=>'Update UserMenu', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete UserMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserMenu', 'url'=>array('admin')),
);
?>

<h1>View UserMenu #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'UserID',
		'StudentMenu',
		'CycleMenu',
		'CourseMenu',
		'MasterMenu',
		'SettingsMenu',
		'SideMenu',
		'TodayList',
	),
)); ?>
