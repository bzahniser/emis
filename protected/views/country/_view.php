<?php
/* @var $this CountryController */
/* @var $data Country */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CountryID), array('view', 'id'=>$data->CountryID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryName')); ?>:</b>
	<?php echo CHtml::encode($data->CountryName); ?>
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