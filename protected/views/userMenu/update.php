<?php
/* @var $this UserMenuController */
/* @var $model UserMenu */

$this->breadcrumbs=array(
	'User Menus'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserMenu', 'url'=>array('index')),
	array('label'=>'Create UserMenu', 'url'=>array('create')),
	array('label'=>'View UserMenu', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage UserMenu', 'url'=>array('admin')),
);
?>

<h1>Update UserMenu <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>