<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->StudentID), array('view', 'id'=>$data->StudentID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php if($data->ProgramID===NULL) {echo CHtml::encode($data->ProgramID);} else {echo CHtml::encode($data->program->ProgramName);} ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('FullName')); ?>:</b>
	<?php echo CHtml::encode($data->FullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ArabicFullName')); ?>:</b>
	<?php echo CHtml::encode($data->ArabicFullName); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ArabicFullName')); ?>:</b>
	<?php echo CHtml::encode($data->ArabicFullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentId')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RelationDID')); ?>:</b>
	<?php echo CHtml::encode($data->RelationDID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FatherIsAlive')); ?>:</b>
	<?php echo CHtml::encode($data->FatherIsAlive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MotherIsAlive')); ?>:</b>
	<?php echo CHtml::encode($data->MotherIsAlive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegisteredinEducation')); ?>:</b>
	<?php echo CHtml::encode($data->RegisteredinEducation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastGradeServed')); ?>:</b>
	<?php echo CHtml::encode($data->LastGradeServed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsMale')); ?>:</b>
	<?php echo CHtml::encode($data->IsMale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BirthDate')); ?>:</b>
	<?php echo CHtml::encode($data->BirthDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BirthCountryID')); ?>:</b>
	<?php echo CHtml::encode($data->BirthCountryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PhoneNumber')); ?>:</b>
	<?php echo CHtml::encode($data->PhoneNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Whatsup')); ?>:</b>
	<?php echo CHtml::encode($data->Whatsup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MedicalStatusID')); ?>:</b>
	<?php echo CHtml::encode($data->MedicalStatusID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HouseHeadRelationID')); ?>:</b>
	<?php echo CHtml::encode($data->HouseHeadRelationID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumberOfPersons')); ?>:</b>
	<?php echo CHtml::encode($data->NumberOfPersons); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CurrentCountryID')); ?>:</b>
	<?php echo CHtml::encode($data->CurrentCountryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CurrentCityID')); ?>:</b>
	<?php echo CHtml::encode($data->CurrentCityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OriginalCountryID')); ?>:</b>
	<?php echo CHtml::encode($data->OriginalCountryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OriginalCityID')); ?>:</b>
	<?php echo CHtml::encode($data->OriginalCityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BenefitFromIRC')); ?>:</b>
	<?php echo CHtml::encode($data->BenefitFromIRC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MediaApproval')); ?>:</b>
	<?php echo CHtml::encode($data->MediaApproval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RgistrationCountryID')); ?>:</b>
	<?php echo CHtml::encode($data->RgistrationCountryID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegistrationCityID')); ?>:</b>
	<?php echo CHtml::encode($data->RegistrationCityID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegistrationEmpID')); ?>:</b>
	<?php echo CHtml::encode($data->RegistrationEmpID); ?>
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