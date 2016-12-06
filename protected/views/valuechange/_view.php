<?php
/* @var $this ValuechangeController */
/* @var $data Valuechange */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChangeID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ChangeID), array('view', 'id'=>$data->ChangeID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChangeTypeID')); ?>:</b>
	<?php echo CHtml::encode($data->ChangeTypeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChangeTypeName')); ?>:</b>
	<?php echo CHtml::encode($data->ChangeTypeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RecordID')); ?>:</b>
	<?php echo CHtml::encode($data->RecordID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OldValue')); ?>:</b>
	<?php echo CHtml::encode($data->OldValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NewValue')); ?>:</b>
	<?php echo CHtml::encode($data->NewValue); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ChangeReasonID')); ?>:</b>
	<?php echo CHtml::encode($data->ChangeReasonID); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->UpdatedBy); ?>
	<br />

	*/ ?>

</div>