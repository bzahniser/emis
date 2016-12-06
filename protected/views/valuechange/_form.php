<?php
/* @var $this ValuechangeController */
/* @var $model Valuechange */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'valuechange-form',
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
		<?php echo $form->labelEx($model,'ChangeTypeID'); ?>
		<?php echo $form->textField($model,'ChangeTypeID'); ?>
		<?php echo $form->error($model,'ChangeTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ChangeTypeName'); ?>
		<?php echo $form->textField($model,'ChangeTypeName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'ChangeTypeName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RecordID'); ?>
		<?php echo $form->textField($model,'RecordID'); ?>
		<?php echo $form->error($model,'RecordID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OldValue'); ?>
		<?php echo $form->textField($model,'OldValue',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'OldValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NewValue'); ?>
		<?php echo $form->textField($model,'NewValue',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'NewValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ChangeReasonID'); ?>
		<?php echo $form->textField($model,'ChangeReasonID'); ?>
		<?php echo $form->error($model,'ChangeReasonID'); ?>
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