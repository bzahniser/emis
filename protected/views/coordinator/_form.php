<?php
/* @var $this CoordinatorController */
/* @var $model Coordinator */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coordinator-form',
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
		<?php 
                    if (Yii::app()->user->getState('ProgramID')===0)
                        {
                            $Array = CHtml::listData(program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array( 'empty'=>'-- Select --'));
                        }
                        else 
                        {
                            $Cond='Active=1 and ProgramID='.Yii::app()->user->getState('ProgramID');
                            $model->ProgramID=Yii::app()->user->getState('ProgramID');
                            $Array = CHtml::listData(program::model()->findAll($Cond), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array());
                        }
                ?>
		<?php echo $form->error($model,'ProgramID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CoordinatorName'); ?>
		<?php echo $form->textField($model,'CoordinatorName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CoordinatorName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CoordinatorLastName'); ?>
		<?php echo $form->textField($model,'CoordinatorLastName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CoordinatorLastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentTypeID'); ?>
		<?php echo $form->dropDownList($model, 'DocumentTypeID', 
                        CHtml::listData(DocumentType::model()->findAll('Active=1'), 'TypeID', 'TypeName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'DocumentTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentID'); ?>
		<?php echo $form->textField($model,'DocumentID',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'DocumentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GroupID'); ?>
		<?php echo $form->dropDownList($model, 'GroupID', 
                        CHtml::listData(CoordinatorGroup::model()->findAll('Active=1'), 'GroupID', 'GroupName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'GroupID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PhoneNumber'); ?>
		<?php echo $form->textField($model,'PhoneNumber',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'PhoneNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Whatsup'); ?>
		<?php echo $form->textField($model,'Whatsup',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Whatsup'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->