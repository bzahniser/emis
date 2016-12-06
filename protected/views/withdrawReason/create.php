<?php
/* @var $this WithdrawReasonController */
/* @var $model WithdrawReason */

$this->breadcrumbs=array(
	'Withdraw Reasons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WithdrawReason', 'url'=>array('index')),
	array('label'=>'Manage WithdrawReason', 'url'=>array('admin')),
);
?>

<h1>Create WithdrawReason</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>