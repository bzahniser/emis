<?php
/* @var $this DocumentController */
/* @var $data Document */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('DID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->DID), array('view', 'id'=>$data->DID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentTypeID')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentTypeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentID')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RelationID')); ?>:</b>
	<?php echo CHtml::encode($data->RelationID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentID')); ?>:</b>
	<?php echo CHtml::encode($data->StudentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FatherName')); ?>:</b>
	<?php echo CHtml::encode($data->FatherName); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MotherFullName')); ?>:</b>
	<?php echo CHtml::encode($data->MotherFullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ParentPhone')); ?>:</b>
	<?php echo CHtml::encode($data->ParentPhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RelativeName')); ?>:</b>
	<?php echo CHtml::encode($data->RelativeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RelativePhone')); ?>:</b>
	<?php echo CHtml::encode($data->RelativePhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ParentPhone2')); ?>:</b>
	<?php echo CHtml::encode($data->ParentPhone2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Phone')); ?>:</b>
	<?php echo CHtml::encode($data->Phone); ?>
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