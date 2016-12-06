<?php
/* @var $this ProspectBenfeciaryController */
/* @var $model ProspectBenfeciary */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prospect-benfeciary-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LastName'); ?>
		<?php echo $form->textField($model,'LastName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'LastName'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'FatherName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ArabicName'); ?>
		<?php echo $form->textField($model,'ArabicName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'ArabicName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ArabicLastName'); ?>
		<?php echo $form->textField($model,'ArabicLastName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'ArabicLastName'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentTypeId'); ?>
		<?php echo $form->dropDownList($model, 'DocumentTypeId', 
                        CHtml::listData(DocumentType::model()->findAll('Active=1'), 'TypeID', 'TypeName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'DocumentTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentId'); ?>
		<?php echo $form->textField($model,'DocumentId',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'DocumentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Gender'); ?>
		<?php echo $form->textField($model,'Gender'); ?>
		<?php echo $form->error($model,'Gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BirthDate'); ?>
		<?php 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'BirthDate',
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
                        'showOtherMonths' => true,      // show dates in other months
                        'selectOtherMonths' => true,    // can seelect dates in other months
                        'changeYear' => true,           // can change year
                        'changeMonth' => true,          // can change month
                        'yearRange' => '2050:2018',     // range of year
                    ),
                    'htmlOptions' => array(
                    'size' => '10',         // textField size
                    'maxlength' => '10',    // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'BirthDate'); ?>
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
        
        <div class="row">
		<?php echo $form->labelEx($model,'SatutsID'); ?>
		<?php echo $form->dropDownList($model, 'SatutsID', 
                        CHtml::listData(Prostatus::model()->findAll('Active=1'), 'ID', 'Name'),
                        array('empty'=>'-- Select --',
                                'ajax' => array(
                                     'type'=>'POST',
                                     'url'=>CController::createUrl('prospectbenfeciary/fillCity'),
                                    'update'=>'#'.CHtml::activeId($model,'OriginalCityID')
                                    ),))
                ?>
		<?php echo $form->error($model,'SatutsID'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'OriginalCityID'); ?>
		<?php echo $form->dropDownList($model, 'OriginalCityID', array())?>
		<?php echo $form->error($model,'OriginalCityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VisitReasonID'); ?>
		<?php echo $form->dropDownList($model, 'VisitReasonID', 
                        CHtml::listData(VisitReason::model()->findAll('Active=1'), 'ID', 'Name'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'VisitReasonID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActionID'); ?>
		<?php echo $form->dropDownList($model, 'ActionID', 
                        CHtml::listData(RecpAction::model()->findAll('Active=1'), 'ID', 'Name'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'ActionID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Desc'); ?>
		<?php echo $form->textArea($model,'Desc',array('size'=>100,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->