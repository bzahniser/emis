<?php
/* @var $this UserMenuController */
/* @var $model UserMenu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-menu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
		<?php echo $form->error($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StudentMenu'); ?>
		<?php echo $form->checkBox($model,'StudentMenu'); ?>
		<?php echo $form->error($model,'StudentMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleMenu'); ?>
		<?php echo $form->checkBox($model,'CycleMenu'); ?>
		<?php echo $form->error($model,'CycleMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseMenu'); ?>
		<?php echo $form->checkBox($model,'CourseMenu'); ?>
		<?php echo $form->error($model,'CourseMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MasterMenu'); ?>
		<?php echo $form->checkBox($model,'MasterMenu'); ?>
		<?php echo $form->error($model,'MasterMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SettingsMenu'); ?>
		<?php echo $form->checkBox($model,'SettingsMenu'); ?>
		<?php echo $form->error($model,'SettingsMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SideMenu'); ?>
		<?php echo $form->checkBox($model,'SideMenu'); ?>
		<?php echo $form->error($model,'SideMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TodayList'); ?>
		<?php echo $form->checkBox($model,'TodayList'); ?>
		<?php echo $form->error($model,'TodayList'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'AttendanceMenu'); ?>
		<?php echo $form->checkBox($model,'AttendanceMenu'); ?>
		<?php echo $form->error($model,'AttendanceMenu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->