<?php
/* @var $this CoordinatorController */
/* @var $data Coordinator */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CoordinatorID), array('view', 'id'=>$data->CoordinatorID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorName')); ?>:</b>
	<?php echo CHtml::encode($data->CoordinatorName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorLastName')); ?>:</b>
	<?php echo CHtml::encode($data->CoordinatorLastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorFullName')); ?>:</b>
	<?php echo CHtml::encode($data->CoordinatorFullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PhoneNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PhoneNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Whatsup')); ?>:</b>
	<?php echo CHtml::encode($data->Whatsup); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupID')); ?>:</b>
	<?php echo CHtml::encode($data->GroupID); ?>
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