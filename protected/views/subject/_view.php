<?php
/* @var $this SubjectController */
/* @var $data Subject */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubjectID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SubjectID), array('view', 'id'=>$data->SubjectID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubjectName')); ?>:</b>
	<?php echo CHtml::encode($data->SubjectName); ?>
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