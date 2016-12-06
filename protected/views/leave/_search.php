<?php
/* @var $this LeaveController */
/* @var $model Leave */
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
		<?php echo $form->label($model,'LeaveID'); ?>
		<?php echo $form->textField($model,'LeaveID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LeaveName'); ?>
		<?php echo $form->textField($model,'LeaveName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LeaveDateFrom'); ?>
		<?php echo $form->textField($model,'LeaveDateFrom'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'LeaveDateTo'); ?>
		<?php echo $form->textField($model,'LeaveDateTo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ReasonID'); ?>
		<?php echo $form->textField($model,'ReasonID'); ?>
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