<?php
/* @var $this FacilitatorController */
/* @var $model Facilitator */
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
		<?php echo $form->label($model,'FacilitatorID'); ?>
		<?php echo $form->textField($model,'FacilitatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FacilitatorName'); ?>
		<?php echo $form->textField($model,'FacilitatorName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FacilitatorLastName'); ?>
		<?php echo $form->textField($model,'FacilitatorLastName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FacilitatorFullName'); ?>
		<?php echo $form->textField($model,'FacilitatorFullName',array('size'=>51,'maxlength'=>51)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BirthDate'); ?>
		<?php echo $form->textField($model,'BirthDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EducationLevel'); ?>
		<?php echo $form->textField($model,'EducationLevel',array('size'=>25,'maxlength'=>25)); ?>
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
		<?php echo $form->label($model,'IsMale'); ?>
		<?php echo $form->textField($model,'IsMale',array('size'=>1,'maxlength'=>1)); ?>
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
		<?php echo $form->label($model,'StartDate'); ?>
		<?php echo $form->textField($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EndDate'); ?>
		<?php echo $form->textField($model,'EndDate'); ?>
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