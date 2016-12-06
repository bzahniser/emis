<?php
/* @var $this ExamController */
/* @var $data Exam */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ExamID), array('view', 'id'=>$data->ExamID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamName')); ?>:</b>
	<?php echo CHtml::encode($data->ExamName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamScore')); ?>:</b>
	<?php echo CHtml::encode($data->ExamScore); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamPassingPercentage')); ?>:</b>
	<?php echo CHtml::encode($data->ExamPassingPercentage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ExamCertification')); ?>:</b>
	<?php echo CHtml::encode($data->ExamCertification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorID')); ?>:</b>
	<?php if($data->CoordinatorID===NULL) {echo CHtml::encode($data->CoordinatorID);} else {echo CHtml::encode($data->coordinator->CoordinatorName);} ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('SubjectID')); ?>:</b>
	<?php echo CHtml::encode($data->SubjectID); ?>
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