<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
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
		<?php echo $form->textField($model,'ProgramID'); ?>
		<?php echo $form->error($model,'ProgramID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentTypeID'); ?>
		<?php echo $form->textField($model,'DocumentTypeID'); ?>
		<?php echo $form->error($model,'DocumentTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentID'); ?>
		<?php echo $form->textField($model,'DocumentID',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'DocumentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RelationID'); ?>
		<?php echo $form->textField($model,'RelationID'); ?>
		<?php echo $form->error($model,'RelationID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
		<?php echo $form->error($model,'StudentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('size'=>51,'maxlength'=>51)); ?>
		<?php echo $form->error($model,'FatherName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MotherFullName'); ?>
		<?php echo $form->textField($model,'MotherFullName',array('size'=>51,'maxlength'=>51)); ?>
		<?php echo $form->error($model,'MotherFullName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ParentPhone'); ?>
		<?php echo $form->textField($model,'ParentPhone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'ParentPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RelativeName'); ?>
		<?php echo $form->textField($model,'RelativeName',array('size'=>51,'maxlength'=>51)); ?>
		<?php echo $form->error($model,'RelativeName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RelativePhone'); ?>
		<?php echo $form->textField($model,'RelativePhone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'RelativePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ParentPhone2'); ?>
		<?php echo $form->textField($model,'ParentPhone2',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'ParentPhone2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Created'); ?>
		<?php echo $form->textField($model,'Created'); ?>
		<?php echo $form->error($model,'Created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreatedBy'); ?>
		<?php echo $form->textField($model,'CreatedBy'); ?>
		<?php echo $form->error($model,'CreatedBy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Updated'); ?>
		<?php echo $form->textField($model,'Updated'); ?>
		<?php echo $form->error($model,'Updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UpdatedBy'); ?>
		<?php echo $form->textField($model,'UpdatedBy'); ?>
		<?php echo $form->error($model,'UpdatedBy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->