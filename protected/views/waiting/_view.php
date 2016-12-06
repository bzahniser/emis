<?php
/* @var $this WaitingController */
/* @var $data Waiting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('WaitingID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->WaitingID), array('view', 'id'=>$data->WaitingID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentID')); ?>:</b>
	<?php if($data->StudentID===NULL) {echo CHtml::encode($data->StudentID);} else {echo CHtml::encode($data->student->FullName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseID')); ?>:</b>
	<?php if($data->CourseID===NULL) {echo CHtml::encode($data->CourseID);} else {echo CHtml::encode($data->course->CourseName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LevelID')); ?>:</b>
	<?php if($data->LevelID===NULL) {echo CHtml::encode($data->LevelID);} else {echo CHtml::encode($data->level->LevelName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Enrolled')); ?>:</b>
	<?php echo CHtml::encode($data->Enrolled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EnrolmentDate')); ?>:</b>
	<?php echo CHtml::encode($data->EnrolmentDate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleStartDate')); ?>:</b>
	<?php echo CHtml::encode($data->CycleStartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InformedOfCycleOpening')); ?>:</b>
	<?php echo CHtml::encode($data->InformedOfCycleOpening); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Closed')); ?>:</b>
	<?php echo CHtml::encode($data->Closed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CloseDate')); ?>:</b>
	<?php echo CHtml::encode($data->CloseDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ClosedBy')); ?>:</b>
	<?php echo CHtml::encode($data->ClosedBy); ?>
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