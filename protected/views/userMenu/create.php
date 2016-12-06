<?php
/* @var $this UserMenuController */
/* @var $model UserMenu */

$this->breadcrumbs=array(
	'User Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserMenu', 'url'=>array('index')),
	array('label'=>'Manage UserMenu', 'url'=>array('admin')),
);
?>

<h1>Create UserMenu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>