<?php
/* @var $this WithdrawReasonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Withdraw Reasons',
);

$this->menu=array(
	array('label'=>'Create WithdrawReason', 'url'=>array('create')),
	array('label'=>'Manage WithdrawReason', 'url'=>array('admin')),
);
?>

<h1>Withdraw Reasons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
