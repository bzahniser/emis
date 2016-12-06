<?php
/* @var $this CycleEnrolmentController */
/* @var $data CycleEnrolment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EnrolmentID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EnrolmentID), array('view', 'id'=>$data->EnrolmentID)); ?>
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
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('CycleID')); ?>:</b>
	<?php if($data->CycleID===NULL) {echo CHtml::encode($data->CycleID);} else {echo CHtml::encode($data->cycle->CycleName);} ?>
	<br />
        
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Transportation')); ?>:</b>
	<?php echo CHtml::encode($data->Transportation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Withdrawl')); ?>:</b>
	<?php echo CHtml::encode($data->Withdrawl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WithdrawlDate')); ?>:</b>
	<?php echo CHtml::encode($data->WithdrawlDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WithdrawlUpdate')); ?>:</b>
	<?php echo CHtml::encode($data->WithdrawlUpdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WithdrawlUpdatedBy')); ?>:</b>
	<?php echo CHtml::encode($data->WithdrawlUpdatedBy); ?>
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