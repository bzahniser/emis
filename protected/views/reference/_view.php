<?php
/* @var $this ReferenceController */
/* @var $data Reference */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefrenceID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RefrenceID), array('view', 'id'=>$data->RefrenceID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RefrenceName')); ?>:</b>
	<?php echo CHtml::encode($data->RefrenceName); ?>
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