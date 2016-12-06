<?php
/* @var $this WaitingController */
/* @var $model Waiting */
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
		<?php echo $form->label($model,'WaitingID'); ?>
		<?php echo $form->textField($model,'WaitingID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
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
		<?php echo $form->label($model,'Enrolled'); ?>
		<?php echo $form->textField($model,'Enrolled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EnrolmentDate'); ?>
		<?php echo $form->textField($model,'EnrolmentDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CycleStartDate'); ?>
		<?php echo $form->textField($model,'CycleStartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InformedOfCycleOpening'); ?>
		<?php echo $form->textField($model,'InformedOfCycleOpening'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Closed'); ?>
		<?php echo $form->textField($model,'Closed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CloseDate'); ?>
		<?php echo $form->textField($model,'CloseDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ClosedBy'); ?>
		<?php echo $form->textField($model,'ClosedBy'); ?>
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