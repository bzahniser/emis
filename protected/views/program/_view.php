<?php
/* @var $this ProgramController */
/* @var $data Program */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ProgramID), array('view', 'id'=>$data->ProgramID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramName')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProgramDescription')); ?>:</b>
	<?php echo CHtml::encode($data->ProgramDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryID')); ?>:</b>
	<?php if($data->CountryID===NULL) {echo CHtml::encode($data->CountryID);} else {echo CHtml::encode($data->country->CountryName);} ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BudgetID')); ?>:</b>
	<?php echo CHtml::encode($data->BudgetID); ?>
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