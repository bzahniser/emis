<?php
/* @var $this WithdrawReasonController */
/* @var $model WithdrawReason */

$this->breadcrumbs=array(
	'Withdraw Reasons'=>array('index'),
	$model->ReasonID=>array('view','id'=>$model->ReasonID),
	'Update',
);

$this->menu=array(
	array('label'=>'List WithdrawReason', 'url'=>array('index')),
	array('label'=>'Create WithdrawReason', 'url'=>array('create')),
	array('label'=>'View WithdrawReason', 'url'=>array('view', 'id'=>$model->ReasonID)),
	array('label'=>'Manage WithdrawReason', 'url'=>array('admin')),
);
?>

<h1>Update WithdrawReason <?php echo $model->ReasonID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>