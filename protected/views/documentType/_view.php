<?php
/* @var $this DocumentTypeController */
/* @var $data DocumentType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TypeID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TypeID), array('view', 'id'=>$data->TypeID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TypeName')); ?>:</b>
	<?php echo CHtml::encode($data->TypeName); ?>
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