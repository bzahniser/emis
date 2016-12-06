<?php
/* @var $this CourseController */
/* @var $model Course */
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
		<?php echo $form->label($model,'CourseID'); ?>
		<?php echo $form->textField($model,'CourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseCode'); ?>
		<?php echo $form->textField($model,'CourseCode',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseName'); ?>
		<?php echo $form->textField($model,'CourseName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseDescription'); ?>
		<?php echo $form->textField($model,'CourseDescription',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Provider'); ?>
		<?php echo $form->textField($model,'Provider',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IsSchool'); ?>
		<?php echo $form->textField($model,'IsSchool'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CoordinatorID'); ?>
		<?php echo $form->textField($model,'CoordinatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseTypeID'); ?>
		<?php echo $form->textField($model,'CourseTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseGroupID'); ?>
		<?php echo $form->textField($model,'CourseGroupID'); ?>
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