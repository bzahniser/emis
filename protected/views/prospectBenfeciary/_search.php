<?php
/* @var $this ProspectBenfeciaryController */
/* @var $model ProspectBenfeciary */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FullName'); ?>
		<?php echo $form->textField($model,'FullName',array('size'=>51,'maxlength'=>51)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ArabicName'); ?>
		<?php echo $form->textField($model,'ArabicName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ArabicLastName'); ?>
		<?php echo $form->textField($model,'ArabicLastName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ArabicFullName'); ?>
		<?php echo $form->textField($model,'ArabicFullName',array('size'=>51,'maxlength'=>51)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DocumentTypeId'); ?>
		<?php echo $form->textField($model,'DocumentTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DocumentId'); ?>
		<?php echo $form->textField($model,'DocumentId',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BirthDate'); ?>
		<?php echo $form->textField($model,'BirthDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PhoneNumber'); ?>
		<?php echo $form->textField($model,'PhoneNumber',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Whatsup'); ?>
		<?php echo $form->textField($model,'Whatsup',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SatutsID'); ?>
		<?php echo $form->textField($model,'SatutsID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CurrentCountryID'); ?>
		<?php echo $form->textField($model,'CurrentCountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CurrentCityID'); ?>
		<?php echo $form->textField($model,'CurrentCityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OriginalCountryID'); ?>
		<?php echo $form->textField($model,'OriginalCountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OriginalCityID'); ?>
		<?php echo $form->textField($model,'OriginalCityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VisitReasonID'); ?>
		<?php echo $form->textField($model,'VisitReasonID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActionID'); ?>
		<?php echo $form->textField($model,'ActionID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Desc'); ?>
		<?php echo $form->textField($model,'Desc',array('size'=>60,'maxlength'=>200)); ?>
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