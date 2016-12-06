<?php
/* @var $this FacilitatorController */
/* @var $data Facilitator */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('FacilitatorID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->FacilitatorID), array('view', 'id'=>$data->FacilitatorID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FacilitatorFullName')); ?>:</b>
	<?php echo CHtml::encode($data->FacilitatorFullName); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('CityID')); ?>:</b>
	<?php if($data->CityID===NULL) {echo CHtml::encode($data->CityID);} else {echo CHtml::encode($data->city->CityName);} ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentTypeID')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentTypeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentID')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsMale')); ?>:</b>
	<?php echo CHtml::encode($data->IsMale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryID')); ?>:</b>
	<?php echo CHtml::encode($data->CountryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityID')); ?>:</b>
	<?php echo CHtml::encode($data->CityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndDate')); ?>:</b>
	<?php echo CHtml::encode($data->EndDate); ?>
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