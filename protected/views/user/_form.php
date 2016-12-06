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
		<?php echo $form->labelEx($model,'ProgramID'); ?>
		<?php  $ProgramArray = CHtml::listData(program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                        echo $form->dropDownList($model, 'ProgramID',$ProgramArray,
                        array( 'empty'=>'-- Select --',)
                     );
                ?>
		<?php echo $form->error($model,'ProgramID'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'LoginName'); ?>
		<?php echo $form->textField($model,'LoginName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'LoginName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'FirstName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DefaultLanguageID'); ?>
		<?php echo $form->textField($model,'DefaultLanguageID'); ?>
		<?php echo $form->error($model,'DefaultLanguageID'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Mail'); ?>
		<?php echo $form->textField($model,'Mail',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Mail'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'FacilitatorID'); ?>
		<?php echo $form->dropDownList($model, 'FacilitatorID', 
                        CHtml::listData(Facilitator::model()->findAll('Active=1'), 'FacilitatorID', 'FacilitatorFullName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'FacilitatorID'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'CoordinatorID'); ?>
		<?php echo $form->dropDownList($model, 'CoordinatorID', 
                        CHtml::listData(Coordinator::model()->findAll('Active=1'), 'CoordinatorID', 'CoordinatorFullName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'CoordinatorID'); ?>
	</div>
        
        <div class="row">
		<?php if($model->isNewRecord) echo $form->labelEx($modelAuthAss,'itemname'); ?>
		<?php 
                    if($model->isNewRecord)
                    {
                        echo $form->dropDownList($modelAuthAss, 'itemname', 
                            CHtml::listData(Authitem::model()->findAll('type=2'), 'name', 'name'),
                            array('empty'=>'-- Select --'));
                    }
                 ?>
		<?php if($model->isNewRecord)echo $form->error($modelAuthAss,'itemname'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'SessionOnlyAttendance'); ?>
		<?php echo $form->checkBox($model,'SessionOnlyAttendance'); ?>
		<?php echo $form->error($model,'SessionOnlyAttendance'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->