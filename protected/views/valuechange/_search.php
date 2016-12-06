<?php
/* @var $this ValuechangeController */
/* @var $model Valuechange */
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
		<?php echo $form->label($model,'ChangeID'); ?>
		<?php echo $form->textField($model,'ChangeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChangeTypeID'); ?>
		<?php echo $form->textField($model,'ChangeTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChangeTypeName'); ?>
		<?php echo $form->textField($model,'ChangeTypeName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RecordID'); ?>
		<?php echo $form->textField($model,'RecordID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OldValue'); ?>
		<?php echo $form->textField($model,'OldValue',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NewValue'); ?>
		<?php echo $form->textField($model,'NewValue',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ChangeReasonID'); ?>
		<?php echo $form->textField($model,'ChangeReasonID'); ?>
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