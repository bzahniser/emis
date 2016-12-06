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
		<?php echo CHtml::label('User','UserID'); ?>
		<?php 
                    $Array = CHtml::listData(user::model()->findAll('Active=1'), 'UserID', 'LoginName');
                    echo CHtml::dropDownList('UserID',1,$Array);
                ?>
	</div>
        
	<div class="row">
		<?php echo CHtml::label('New Password','NewPassword'); ?>
		<?php echo CHtml::passwordField('NewPassword'); ?>
	</div>
        

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->