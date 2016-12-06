<?php
/* @var $this ProgramController */
/* @var $model Program */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'program-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ProgramName'); ?>
		<?php echo $form->textField($model,'ProgramName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'ProgramName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ProgramDescription'); ?>
		<?php echo $form->textField($model,'ProgramDescription',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ProgramDescription'); ?>
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
		<?php echo $form->labelEx($model,'StartDate'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'StartDate',
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
                        'showOtherMonths' => true,      // show dates in other months
                        'selectOtherMonths' => true,    // can seelect dates in other months
                        'changeYear' => true,           // can change year
                        'changeMonth' => true,          // can change month
                        'yearRange' => '2012:2020',     // range of year
                    ),
                    'htmlOptions' => array(
                    'size' => '10',         // textField size
                    'maxlength' => '10',    // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BudgetID'); ?>
		<?php echo $form->textField($model,'BudgetID',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'BudgetID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->checkBox($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->