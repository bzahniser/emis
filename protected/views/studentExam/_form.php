<?php
/* @var $this StudentExamController */
/* @var $model StudentExam */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-exam-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ProgramID'); ?>
		<?php echo $form->textField($model,'ProgramID'); ?>
		<?php echo $form->error($model,'ProgramID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
		<?php echo $form->error($model,'StudentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EnrolmentID'); ?>
		<?php echo $form->textField($model,'EnrolmentID'); ?>
		<?php echo $form->error($model,'EnrolmentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseID'); ?>
		<?php echo $form->textField($model,'CourseID'); ?>
		<?php echo $form->error($model,'CourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LevelID'); ?>
		<?php echo $form->textField($model,'LevelID'); ?>
		<?php echo $form->error($model,'LevelID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleID'); ?>
		<?php echo $form->textField($model,'CycleID'); ?>
		<?php echo $form->error($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubjectID'); ?>
		<?php echo $form->textField($model,'SubjectID'); ?>
		<?php echo $form->error($model,'SubjectID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamID'); ?>
		<?php echo $form->textField($model,'ExamID'); ?>
		<?php echo $form->error($model,'ExamID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LevelExamID'); ?>
		<?php echo $form->textField($model,'LevelExamID'); ?>
		<?php echo $form->error($model,'LevelExamID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleExamID'); ?>
		<?php echo $form->textField($model,'CycleExamID'); ?>
		<?php echo $form->error($model,'CycleExamID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StudentScore'); ?>
		<?php echo $form->textField($model,'StudentScore',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'StudentScore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamDate'); ?>
		<?php echo $form->textField($model,'ExamDate'); ?>
		<?php echo $form->error($model,'ExamDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamTime'); ?>
		<?php echo $form->textField($model,'ExamTime'); ?>
		<?php echo $form->error($model,'ExamTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CountryID'); ?>
		<?php echo $form->textField($model,'CountryID'); ?>
		<?php echo $form->error($model,'CountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CityID'); ?>
		<?php echo $form->textField($model,'CityID'); ?>
		<?php echo $form->error($model,'CityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CenterID'); ?>
		<?php echo $form->textField($model,'CenterID'); ?>
		<?php echo $form->error($model,'CenterID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TotalScore'); ?>
		<?php echo $form->textField($model,'TotalScore',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'TotalScore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PassingScore'); ?>
		<?php echo $form->textField($model,'PassingScore',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PassingScore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pre'); ?>
		<?php echo $form->textField($model,'Pre'); ?>
		<?php echo $form->error($model,'Pre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Post'); ?>
		<?php echo $form->textField($model,'Post'); ?>
		<?php echo $form->error($model,'Post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mid'); ?>
		<?php echo $form->textField($model,'Mid'); ?>
		<?php echo $form->error($model,'Mid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
		<?php echo $form->error($model,'Created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreatedBy'); ?>
		<?php echo $form->textField($model,'CreatedBy'); ?>
		<?php echo $form->error($model,'CreatedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Updated'); ?>
		<?php echo $form->textField($model,'Updated'); ?>
		<?php echo $form->error($model,'Updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UpdatedBy'); ?>
		<?php echo $form->textField($model,'UpdatedBy'); ?>
		<?php echo $form->error($model,'UpdatedBy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->