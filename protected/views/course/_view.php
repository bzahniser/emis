<?php
/* @var $this CourseController */
/* @var $data Course */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CourseID), array('view', 'id'=>$data->CourseID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseCode')); ?>:</b>
	<?php echo CHtml::encode($data->CourseCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseName')); ?>:</b>
	<?php echo CHtml::encode($data->CourseName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Provider')); ?>:</b>
	<?php echo CHtml::encode($data->Provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsSchool')); ?>:</b>
	<?php echo CHtml::encode($data->IsSchool); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('CourseTypeID')); ?>:</b>
	<?php if($data->CourseTypeID===NULL) {echo CHtml::encode($data->CourseTypeID);} else {echo CHtml::encode($data->courseType->CourseTypeName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseGroupID')); ?>:</b>
	<?php if($data->CourseGroupID===NULL) {echo CHtml::encode($data->CourseGroupID);} else {echo CHtml::encode($data->courseGroup->GroupName);} ?>
	<br />
        
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorID')); ?>:</b>
	<?php echo CHtml::encode($data->CoordinatorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseTypeID')); ?>:</b>
	<?php echo CHtml::encode($data->CourseTypeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseGroupID')); ?>:</b>
	<?php echo CHtml::encode($data->CourseGroupID); ?>
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