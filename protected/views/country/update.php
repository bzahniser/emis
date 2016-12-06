<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->CountryID=>array('view','id'=>$model->CountryID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Country', 'url'=>array('index')),
	array('label'=>'Create Country', 'url'=>array('create')),
	array('label'=>'View Country', 'url'=>array('view', 'id'=>$model->CountryID)),
	array('label'=>'Manage Country', 'url'=>array('admin')),
);
?>

<h1>Update Country <?php echo $model->CountryID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>