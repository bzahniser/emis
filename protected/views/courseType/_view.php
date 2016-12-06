<?php
/* @var $this CourseTypeController */
/* @var $data CourseType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseTypeID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CourseTypeID), array('view', 'id'=>$data->CourseTypeID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseTypeName')); ?>:</b>
	<?php echo CHtml::encode($data->CourseTypeName); ?>
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