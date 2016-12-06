<?php
/* @var $this LevelSubjectController */
/* @var $data LevelSubject */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseID')); ?>:</b>
	<?php if($data->CourseID===NULL) {echo CHtml::encode($data->CourseID);} else {echo CHtml::encode($data->course->CourseName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LevelID')); ?>:</b>
	<?php if($data->LevelID===NULL) {echo CHtml::encode($data->LevelID);} else {echo CHtml::encode($data->level->LevelName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubjectID')); ?>:</b>
	<?php if($data->SubjectID===NULL) {echo CHtml::encode($data->SubjectID);} else {echo CHtml::encode($data->subject->SubjectName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamID')); ?>:</b>
	<?php if($data->ExamID===NULL) {echo CHtml::encode($data->ExamID);} else {echo CHtml::encode($data->exam->ExamName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<?php /*
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