<?php
/* @var $this CycleSessionController */
/* @var $data CycleSession */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SessionID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SessionID), array('view', 'id'=>$data->SessionID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseID')); ?>:</b>
	<?php echo CHtml::encode($data->CourseID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LevelID')); ?>:</b>
	<?php echo CHtml::encode($data->LevelID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleID')); ?>:</b>
	<?php echo CHtml::encode($data->CycleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubjectID')); ?>:</b>
	<?php echo CHtml::encode($data->SubjectID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SessionDate')); ?>:</b>
	<?php echo CHtml::encode($data->SessionDate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TimeFrom')); ?>:</b>
	<?php echo CHtml::encode($data->TimeFrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TimeTo')); ?>:</b>
	<?php echo CHtml::encode($data->TimeTo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FacilitatorID')); ?>:</b>
	<?php echo CHtml::encode($data->FacilitatorID); ?>
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