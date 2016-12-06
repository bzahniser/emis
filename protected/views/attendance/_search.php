<?php
/* @var $this AttendanceController */
/* @var $model Attendance */
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
		<?php echo $form->label($model,'AttendanceID'); ?>
		<?php echo $form->textField($model,'AttendanceID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FacilitatorID'); ?>
		<?php echo $form->textField($model,'FacilitatorID'); ?>
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
		<?php echo $form->label($model,'Present'); ?>
		<?php echo $form->textField($model,'Present'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Absent'); ?>
		<?php echo $form->textField($model,'Absent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SessionID'); ?>
		<?php echo $form->textField($model,'SessionID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AttendanceDate'); ?>
		<?php echo $form->textField($model,'AttendanceDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EnrolmentID'); ?>
		<?php echo $form->textField($model,'EnrolmentID'); ?>
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