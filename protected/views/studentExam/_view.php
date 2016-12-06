<?php
/* @var $this StudentExamController */
/* @var $data StudentExam */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentID')); ?>:</b>
	<?php echo CHtml::encode($data->StudentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EnrolmentID')); ?>:</b>
	<?php echo CHtml::encode($data->EnrolmentID); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('SubjectID')); ?>:</b>
	<?php echo CHtml::encode($data->SubjectID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamID')); ?>:</b>
	<?php echo CHtml::encode($data->ExamID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LevelExamID')); ?>:</b>
	<?php echo CHtml::encode($data->LevelExamID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleExamID')); ?>:</b>
	<?php echo CHtml::encode($data->CycleExamID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentScore')); ?>:</b>
	<?php echo CHtml::encode($data->StudentScore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamDate')); ?>:</b>
	<?php echo CHtml::encode($data->ExamDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamTime')); ?>:</b>
	<?php echo CHtml::encode($data->ExamTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryID')); ?>:</b>
	<?php echo CHtml::encode($data->CountryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityID')); ?>:</b>
	<?php echo CHtml::encode($data->CityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CenterID')); ?>:</b>
	<?php echo CHtml::encode($data->CenterID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalScore')); ?>:</b>
	<?php echo CHtml::encode($data->TotalScore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PassingScore')); ?>:</b>
	<?php echo CHtml::encode($data->PassingScore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pre')); ?>:</b>
	<?php echo CHtml::encode($data->Pre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Post')); ?>:</b>
	<?php echo CHtml::encode($data->Post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mid')); ?>:</b>
	<?php echo CHtml::encode($data->Mid); ?>
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