<?php
/* @var $this ExamController */
/* @var $model Exam */
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
		<?php echo $form->label($model,'ExamID'); ?>
		<?php echo $form->textField($model,'ExamID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExamName'); ?>
		<?php echo $form->textField($model,'ExamName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExamScore'); ?>
		<?php echo $form->textField($model,'ExamScore',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExamPassingPercentage'); ?>
		<?php echo $form->textField($model,'ExamPassingPercentage',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ExamCertification'); ?>
		<?php echo $form->textField($model,'ExamCertification'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CoordinatorID'); ?>
		<?php echo $form->textField($model,'CoordinatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubjectID'); ?>
		<?php echo $form->textField($model,'SubjectID'); ?>
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