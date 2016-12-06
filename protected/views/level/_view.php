<?php
/* @var $this LevelController */
/* @var $data Level */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LevelID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LevelID), array('view', 'id'=>$data->LevelID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LevelName')); ?>:</b>
	<?php echo CHtml::encode($data->LevelName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseID')); ?>:</b>
	<?php if($data->CourseID===NULL) {echo CHtml::encode($data->CourseID);} else {echo CHtml::encode($data->course->CourseName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RangeID')); ?>:</b>
	<?php if($data->RangeID===NULL) {echo CHtml::encode($data->RangeID);} else {echo CHtml::encode($data->range->RangeName);} ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Sequence')); ?>:</b>
	<?php echo CHtml::encode($data->Sequence); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('AgeFlexability')); ?>:</b>
	<?php echo CHtml::encode($data->AgeFlexability); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumberOfHours')); ?>:</b>
	<?php echo CHtml::encode($data->NumberOfHours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorID')); ?>:</b>
	<?php echo CHtml::encode($data->CoordinatorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sequence')); ?>:</b>
	<?php echo CHtml::encode($data->Sequence); ?>
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