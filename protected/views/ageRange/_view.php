<?php
/* @var $this AgeRangeController */
/* @var $data AgeRange */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RangeID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RangeID), array('view', 'id'=>$data->RangeID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RangeName')); ?>:</b>
	<?php echo CHtml::encode($data->RangeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RangeFrom')); ?>:</b>
	<?php echo CHtml::encode($data->RangeFrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RangeTo')); ?>:</b>
	<?php echo CHtml::encode($data->RangeTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Created')); ?>:</b>
	<?php echo CHtml::encode($data->Created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedBy); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Updated')); ?>:</b>
	<?php echo CHtml::encode($data->Updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->UpdatedBy); ?>
	<br />

	*/ ?>

</div>