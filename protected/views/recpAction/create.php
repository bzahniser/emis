<?php
/* @var $this RecpActionController */
/* @var $model RecpAction */

$this->breadcrumbs=array(
	'Recp Actions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RecpAction', 'url'=>array('index')),
	array('label'=>'Manage RecpAction', 'url'=>array('admin')),
);
?>

<h1>Create RecpAction</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>