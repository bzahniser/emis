<?php
/* @var $this DocumentController */
/* @var $model Document */
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
		<?php echo $form->label($model,'DID'); ?>
		<?php echo $form->textField($model,'DID'); ?>
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
		<?php echo $form->label($model,'RelationID'); ?>
		<?php echo $form->textField($model,'RelationID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('size'=>51,'maxlength'=>51)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MotherFullName'); ?>
		<?php echo $form->textField($model,'MotherFullName',array('size'=>51,'maxlength'=>51)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ParentPhone'); ?>
		<?php echo $form->textField($model,'ParentPhone',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RelativeName'); ?>
		<?php echo $form->textField($model,'RelativeName',array('size'=>51,'maxlength'=>51)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RelativePhone'); ?>
		<?php echo $form->textField($model,'RelativePhone',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ParentPhone2'); ?>
		<?php echo $form->textField($model,'ParentPhone2',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>25,'maxlength'=>25)); ?>
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