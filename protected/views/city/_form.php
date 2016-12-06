<?php
/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CityName'); ?>
		<?php echo $form->textField($model,'CityName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CityName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CountryID'); ?>
                <?php echo $form->dropDownList($model, 'CountryID', 
                        CHtml::listData(Country::model()->findAll('Active=1'), 'CountryID', 'CountryName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'CountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Region'); ?>
		<?php echo $form->textField($model,'Region',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Region'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->