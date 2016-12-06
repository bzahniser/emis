<?php
/* @var $this AgeRangeController */
/* @var $model AgeRange */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'age-range-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'RangeName'); ?>
		<?php echo $form->textField($model,'RangeName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'RangeName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RangeFrom'); ?>
		<?php echo $form->textField($model,'RangeFrom'); ?>
		<?php echo $form->error($model,'RangeFrom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RangeTo'); ?>
		<?php echo $form->textField($model,'RangeTo'); ?>
		<?php echo $form->error($model,'RangeTo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->checkBox($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Reporting'); ?>
		<?php echo $form->checkBox($model,'Reporting'); ?>
		<?php echo $form->error($model,'Reporting'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->