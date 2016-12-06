<?php
/* @var $this CycleEnrolmentController */
/* @var $model CycleEnrolment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ProgramID'); ?>
		<?php echo $form->textField($model,'ProgramID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EnrolmentID'); ?>
		<?php echo $form->textField($model,'EnrolmentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CycleID'); ?>
		<?php echo $form->textField($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseID'); ?>
		<?php echo $form->textField($model,'CourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LevelID'); ?>
		<?php echo $form->textField($model,'LevelID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WaitingID'); ?>
		<?php echo $form->textField($model,'WaitingID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Transportation'); ?>
		<?php echo $form->textField($model,'Transportation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Withdrawl'); ?>
		<?php echo $form->textField($model,'Withdrawl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WithdrawlDate'); ?>
		<?php echo $form->textField($model,'WithdrawlDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WithdrawlUpdate'); ?>
		<?php echo $form->textField($model,'WithdrawlUpdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WithdrawlUpdatedBy'); ?>
		<?php echo $form->textField($model,'WithdrawlUpdatedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreatedBy'); ?>
		<?php echo $form->textField($model,'CreatedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Updated'); ?>
		<?php echo $form->textField($model,'Updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UpdatedBy'); ?>
		<?php echo $form->textField($model,'UpdatedBy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->