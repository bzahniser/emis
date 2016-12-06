<?php
/* @var $this CoordinatorController */
/* @var $model Coordinator */
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
		<?php echo $form->label($model,'CoordinatorID'); ?>
		<?php echo $form->textField($model,'CoordinatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CoordinatorName'); ?>
		<?php echo $form->textField($model,'CoordinatorName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CoordinatorLastName'); ?>
		<?php echo $form->textField($model,'CoordinatorLastName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CoordinatorFullName'); ?>
		<?php echo $form->textField($model,'CoordinatorFullName',array('size'=>51,'maxlength'=>51)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DocumentTypeID'); ?>
		<?php echo $form->textField($model,'DocumentTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DocumentID'); ?>
		<?php echo $form->textField($model,'DocumentID',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GroupID'); ?>
		<?php echo $form->textField($model,'GroupID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PhoneNumber'); ?>
		<?php echo $form->textField($model,'PhoneNumber',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Whatsup'); ?>
		<?php echo $form->textField($model,'Whatsup',array('size'=>25,'maxlength'=>25)); ?>
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