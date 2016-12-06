<?php
/* @var $this CycleController */
/* @var $model Cycle */
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
		<?php echo $form->label($model,'CycleID'); ?>
		<?php echo $form->textField($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CycleName'); ?>
		<?php echo $form->textField($model,'CycleName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CycleDescription'); ?>
		<?php echo $form->textField($model,'CycleDescription',array('size'=>25,'maxlength'=>25)); ?>
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
		<?php echo $form->label($model,'Room'); ?>
		<?php echo $form->textField($model,'Room'); ?>
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
		<?php echo $form->label($model,'AgeID'); ?>
		<?php echo $form->textField($model,'AgeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AgeFlexability'); ?>
		<?php echo $form->textField($model,'AgeFlexability'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumberOfStudent'); ?>
		<?php echo $form->textField($model,'NumberOfStudent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumberOfHours'); ?>
		<?php echo $form->textField($model,'NumberOfHours',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FacilitatorID'); ?>
		<?php echo $form->textField($model,'FacilitatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Certification'); ?>
		<?php echo $form->textField($model,'Certification'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CoordinatorID'); ?>
		<?php echo $form->textField($model,'CoordinatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Transportation'); ?>
		<?php echo $form->textField($model,'Transportation'); ?>
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