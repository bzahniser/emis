<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="row">
        <?php
        if(isset($errors))
        {
            $base_delay = 0;
            foreach($errors as $error)
            {
                echo '<div class="flash-error">' .$error."</div>\n";
            }
        } ?>
        </div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'LoginName'); ?>
		<?php echo $form->textField($model,'LoginName',array('size'=>25,'maxlength'=>25,'readonly'=>true)); ?>
		<?php echo $form->error($model,'LoginName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>25,'maxlength'=>25,'readonly'=>true)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>25,'maxlength'=>25,'readonly'=>true)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

        <div class="row">
		<?php echo CHtml::label('Current Password','Password'); ?>
		<?php echo CHtml::passwordField('CurrentPassword'); ?>
		
	</div>
        
	<div class="row">
		<?php echo CHtml::label('New Password','NewPassword'); ?>
		<?php echo CHtml::passwordField('NewPassword'); ?>
	</div>
        
        <div class="row">
		<?php echo CHtml::label('Confirm Password','ConfirmPassword'); ?>
		<?php echo CHtml::passwordField('ConfirmPassword'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->