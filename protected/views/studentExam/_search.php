<?php
/* @var $this StudentExamController */
/* @var $model StudentExam */
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
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EnrolmentID'); ?>
		<?php echo $form->textField($model,'EnrolmentID'); ?>
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
		<?php echo $form->label($model,'CycleID'); ?>
		<?php echo $form->textField($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubjectID'); ?>
		<?php echo $form->textField($model,'SubjectID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExamID'); ?>
		<?php echo $form->textField($model,'ExamID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LevelExamID'); ?>
		<?php echo $form->textField($model,'LevelExamID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CycleExamID'); ?>
		<?php echo $form->textField($model,'CycleExamID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StudentScore'); ?>
		<?php echo $form->textField($model,'StudentScore',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExamDate'); ?>
		<?php echo $form->textField($model,'ExamDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExamTime'); ?>
		<?php echo $form->textField($model,'ExamTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CountryID'); ?>
		<?php echo $form->textField($model,'CountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CityID'); ?>
		<?php echo $form->textField($model,'CityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CenterID'); ?>
		<?php echo $form->textField($model,'CenterID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotalScore'); ?>
		<?php echo $form->textField($model,'TotalScore',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PassingScore'); ?>
		<?php echo $form->textField($model,'PassingScore',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Pre'); ?>
		<?php echo $form->textField($model,'Pre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Post'); ?>
		<?php echo $form->textField($model,'Post'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mid'); ?>
		<?php echo $form->textField($model,'Mid'); ?>
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