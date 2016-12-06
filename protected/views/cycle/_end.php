<?php
/* @var $this CycleController */
/* @var $model Cycle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cycle-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleName'); ?>
		<?php echo $form->textField($model,'CycleName',array('size'=>25,'maxlength'=>25,'readonly'=>true)); ?>
		<?php echo $form->error($model,'CycleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleDescription'); ?>
		<?php echo $form->textField($model,'CycleDescription',array('size'=>25,'maxlength'=>25,'readonly'=>true)); ?>
		<?php echo $form->error($model,'CycleDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleEndDate'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'CycleEndDate',
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
		<?php echo $form->error($model,'CycleEndDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->