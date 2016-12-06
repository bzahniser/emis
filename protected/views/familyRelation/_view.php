<?php
/* @var $this FamilyRelationController */
/* @var $data FamilyRelation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RelationID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RelationID), array('view', 'id'=>$data->RelationID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RelationName')); ?>:</b>
	<?php echo CHtml::encode($data->RelationName); ?>
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


</div>