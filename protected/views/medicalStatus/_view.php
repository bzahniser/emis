<?php
/* @var $this MedicalStatusController */
/* @var $data MedicalStatus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('StatusID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->StatusID), array('view', 'id'=>$data->StatusID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StatusName')); ?>:</b>
	<?php echo CHtml::encode($data->StatusName); ?>
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


</div>