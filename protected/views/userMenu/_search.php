<?php
/* @var $this UserMenuController */
/* @var $model UserMenu */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StudentMenu'); ?>
		<?php echo $form->textField($model,'StudentMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CycleMenu'); ?>
		<?php echo $form->textField($model,'CycleMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseMenu'); ?>
		<?php echo $form->textField($model,'CourseMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MasterMenu'); ?>
		<?php echo $form->textField($model,'MasterMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SettingsMenu'); ?>
		<?php echo $form->textField($model,'SettingsMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SideMenu'); ?>
		<?php echo $form->textField($model,'SideMenu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TodayList'); ?>
		<?php echo $form->textField($model,'TodayList'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->