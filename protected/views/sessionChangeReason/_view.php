<?php
/* @var $this SessionChangeReasonController */
/* @var $data SessionChangeReason */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReasonID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ReasonID), array('view', 'id'=>$data->ReasonID)); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReasonName')); ?>:</b>
	<?php echo CHtml::encode($data->ReasonName); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Updated')); ?>:</b>
	<?php echo CHtml::encode($data->Updated); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->UpdatedBy); ?>
	<br />

	*/ ?>

</div>