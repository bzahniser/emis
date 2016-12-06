<?php
/* @var $this LevelController */
/* @var $model Level */
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
		<?php echo $form->label($model,'LevelID'); ?>
		<?php echo $form->textField($model,'LevelID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LevelName'); ?>
		<?php echo $form->textField($model,'LevelName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LevelDescription'); ?>
		<?php echo $form->textField($model,'LevelDescription',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseID'); ?>
		<?php echo $form->textField($model,'CourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LevelCertification'); ?>
		<?php echo $form->textField($model,'LevelCertification'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RangeID'); ?>
		<?php echo $form->textField($model,'RangeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AgeFlexability'); ?>
		<?php echo $form->textField($model,'AgeFlexability'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumberOfHours'); ?>
		<?php echo $form->textField($model,'NumberOfHours'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CoordinatorID'); ?>
		<?php echo $form->textField($model,'CoordinatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sequence'); ?>
		<?php echo $form->textField($model,'Sequence'); ?>
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