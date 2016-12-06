<?php
/* @var $this AttendanceController */
/* @var $data Attendance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('AttendanceID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->AttendanceID), array('view', 'id'=>$data->AttendanceID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentID')); ?>:</b>
	<?php echo CHtml::encode($data->StudentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FacilitatorID')); ?>:</b>
	<?php echo CHtml::encode($data->FacilitatorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleID')); ?>:</b>
	<?php echo CHtml::encode($data->CycleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseID')); ?>:</b>
	<?php echo CHtml::encode($data->CourseID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LevelID')); ?>:</b>
	<?php echo CHtml::encode($data->LevelID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Present')); ?>:</b>
	<?php echo CHtml::encode($data->Present); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Absent')); ?>:</b>
	<?php echo CHtml::encode($data->Absent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SessionID')); ?>:</b>
	<?php echo CHtml::encode($data->SessionID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AttendanceDate')); ?>:</b>
	<?php echo CHtml::encode($data->AttendanceDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserID')); ?>:</b>
	<?php echo CHtml::encode($data->UserID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EnrolmentID')); ?>:</b>
	<?php echo CHtml::encode($data->EnrolmentID); ?>
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