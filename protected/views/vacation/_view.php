<?php
/* @var $this VacationController */
/* @var $data Vacation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('VacationID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VacationID), array('view', 'id'=>$data->VacationID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VacationName')); ?>:</b>
	<?php echo CHtml::encode($data->VacationName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VacationDate')); ?>:</b>
	<?php echo CHtml::encode($data->VacationDate); ?>
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