<?php
/* @var $this CycleController */
/* @var $data Cycle */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CycleID), array('view', 'id'=>$data->CycleID)); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleName')); ?>:</b>
	<?php echo CHtml::encode($data->CycleName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleDescription')); ?>:</b>
	<?php echo CHtml::encode($data->CycleDescription); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryID')); ?>:</b>
	<?php echo CHtml::encode($data->CountryID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CityID')); ?>:</b>
	<?php echo CHtml::encode($data->CityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CenterID')); ?>:</b>
	<?php echo CHtml::encode($data->CenterID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Room')); ?>:</b>
	<?php echo CHtml::encode($data->Room); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndDate')); ?>:</b>
	<?php echo CHtml::encode($data->EndDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AgeID')); ?>:</b>
	<?php echo CHtml::encode($data->AgeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AgeFlexability')); ?>:</b>
	<?php echo CHtml::encode($data->AgeFlexability); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumberOfStudent')); ?>:</b>
	<?php echo CHtml::encode($data->NumberOfStudent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumberOfHours')); ?>:</b>
	<?php echo CHtml::encode($data->NumberOfHours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FacilitatorID')); ?>:</b>
	<?php echo CHtml::encode($data->FacilitatorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Certification')); ?>:</b>
	<?php echo CHtml::encode($data->Certification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorID')); ?>:</b>
	<?php echo CHtml::encode($data->CoordinatorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Transportation')); ?>:</b>
	<?php echo CHtml::encode($data->Transportation); ?>
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