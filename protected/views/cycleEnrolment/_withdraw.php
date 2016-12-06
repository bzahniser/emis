<?php
/* @var $this CycleEnrolmentController */
/* @var $model CycleEnrolment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cycle-enrolment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">    
                <?php echo $form->labelEx($model, 'StudentID'); ?>
                <?php echo $form->textField($model,'StudentID',array('value'=>$SName, 'readonly'=>true)); ?>
                <?php echo $form->error($model, 'StudentID'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleID'); ?>
		<?php echo $form->textField($model,'CycleID',array('value'=>$CName, 'readonly'=>true)); ?>
		<?php echo $form->error($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WithdrawlDate'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'WithdrawlDate',
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
                <?php echo $form->error($model,'WithdrawlDate'); ?>
	</div>
        
        <div class="row">
                <?php echo $form->labelEx($model,'WithdrawReasonID'); ?>
		<?php echo $form->dropDownList($model, 'WithdrawReasonID', 
                        CHtml::listData(WithdrawReason::model()->findAll('Active=1'), 'ReasonID', 'ReasonName'),
                        array( 'empty'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'ProgramID'); ?>
	</div>
        
        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


      
