<?php
/* @var $this VacationController */
/* @var $model Vacation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacation-form',
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
		<?php echo $form->labelEx($model,'VacationName'); ?>
		<?php echo $form->textField($model,'VacationName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'VacationName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VacationDate'); ?>
		<?php echo $form->textField($model,'VacationDate'); ?>
		<?php echo $form->error($model,'VacationDate'); ?>
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