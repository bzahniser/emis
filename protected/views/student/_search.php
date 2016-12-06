<?php
/* @var $this StudentController */
/* @var $model Student */
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
		<?php echo $form->label($model,'StudentID'); ?>
		<?php echo $form->textField($model,'StudentID'); ?>
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
		<?php echo $form->label($model,'RelationDID'); ?>
		<?php echo $form->textField($model,'RelationDID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FatherIsAlive'); ?>
		<?php echo $form->textField($model,'FatherIsAlive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MotherIsAlive'); ?>
		<?php echo $form->textField($model,'MotherIsAlive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RegisteredinEducation'); ?>
		<?php echo $form->textField($model,'RegisteredinEducation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastGradeServed'); ?>
		<?php echo $form->textField($model,'LastGradeServed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IsMale'); ?>
		<?php echo $form->textField($model,'IsMale'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BirthDate'); ?>
		<?php echo $form->textField($model,'BirthDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BirthCountryID'); ?>
		<?php echo $form->textField($model,'BirthCountryID'); ?>
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
		<?php echo $form->label($model,'MedicalStatusID'); ?>
		<?php echo $form->textField($model,'MedicalStatusID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HouseHeadRelationID'); ?>
		<?php echo $form->textField($model,'HouseHeadRelationID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumberOfPersons'); ?>
		<?php echo $form->textField($model,'NumberOfPersons'); ?>
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
		<?php echo $form->label($model,'BenefitFromIRC'); ?>
		<?php echo $form->textField($model,'BenefitFromIRC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MediaApproval'); ?>
		<?php echo $form->textField($model,'MediaApproval'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RgistrationCountryID'); ?>
		<?php echo $form->textField($model,'RgistrationCountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RegistrationCityID'); ?>
		<?php echo $form->textField($model,'RegistrationCityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RegistrationEmpID'); ?>
		<?php echo $form->textField($model,'RegistrationEmpID'); ?>
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