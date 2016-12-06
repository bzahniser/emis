<?php
/* @var $this FacilitatorGroupController */
/* @var $data FacilitatorGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GroupID), array('view', 'id'=>$data->GroupID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupName')); ?>:</b>
	<?php echo CHtml::encode($data->GroupName); ?>
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