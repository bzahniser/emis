<?php
/* @var $this CenterController */
/* @var $data Center */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CenterID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CenterID), array('view', 'id'=>$data->CenterID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CenterName')); ?>:</b>
	<?php echo CHtml::encode($data->CenterName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryID')); ?>:</b>
	<?php if($data->CountryID===NULL) {echo CHtml::encode($data->CountryID);} else {echo CHtml::encode($data->country->CountryName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityID')); ?>:</b>
	<?php if($data->CityID===NULL) {echo CHtml::encode($data->CityID);} else {echo CHtml::encode($data->city->CityName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoordinatorID')); ?>:</b>
	<?php if($data->CoordinatorID===NULL) {echo CHtml::encode($data->CoordinatorID);} else {echo CHtml::encode($data->coordinator->CoordinatorFullName);} ?>
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