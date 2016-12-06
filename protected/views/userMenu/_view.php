<?php
/* @var $this UserMenuController */
/* @var $data UserMenu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserID')); ?>:</b>
	<?php echo CHtml::encode($data->UserID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StudentMenu')); ?>:</b>
	<?php echo CHtml::encode($data->StudentMenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CycleMenu')); ?>:</b>
	<?php echo CHtml::encode($data->CycleMenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseMenu')); ?>:</b>
	<?php echo CHtml::encode($data->CourseMenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MasterMenu')); ?>:</b>
	<?php echo CHtml::encode($data->MasterMenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SettingsMenu')); ?>:</b>
	<?php echo CHtml::encode($data->SettingsMenu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('SideMenu')); ?>:</b>
	<?php echo CHtml::encode($data->SideMenu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TodayList')); ?>:</b>
	<?php echo CHtml::encode($data->TodayList); ?>
	<br />

	*/ ?>

</div>