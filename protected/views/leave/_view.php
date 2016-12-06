<?php
/* @var $this LeaveController */
/* @var $data Leave */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LeaveID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LeaveID), array('view', 'id'=>$data->LeaveID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LeaveName')); ?>:</b>
	<?php echo CHtml::encode($data->LeaveName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LeaveDateFrom')); ?>:</b>
	<?php echo CHtml::encode($data->LeaveDateFrom); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('LeaveDateTo')); ?>:</b>
	<?php echo CHtml::encode($data->LeaveDateTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReasonID')); ?>:</b>
	<?php echo CHtml::encode($data->ReasonID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EnrolmentID')); ?>:</b>
	<?php echo CHtml::encode($data->EnrolmentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentID')); ?>:</b>
	<?php echo CHtml::encode($data->StudentID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleID')); ?>:</b>
	<?php echo CHtml::encode($data->CycleID); ?>
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