<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	$model->SubjectID=>array('view','id'=>$model->SubjectID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subject', 'url'=>array('index')),
	array('label'=>'Create Subject', 'url'=>array('create')),
	array('label'=>'View Subject', 'url'=>array('view', 'id'=>$model->SubjectID)),
	array('label'=>'Manage Subject', 'url'=>array('admin')),
);
?>

<h1>Update Subject <?php echo $model->SubjectID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>