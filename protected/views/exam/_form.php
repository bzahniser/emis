<?php
/* @var $this ExamController */
/* @var $model Exam */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'exam-form',
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
		<?php echo $form->dropDownList($model, 'ProgramID', 
                        CHtml::listData(Program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'ProgramID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamName'); ?>
		<?php echo $form->textField($model,'ExamName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'ExamName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamScore'); ?>
		<?php echo $form->textField($model,'ExamScore',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ExamScore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamPassingPercentage'); ?>
		<?php echo $form->textField($model,'ExamPassingPercentage',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ExamPassingPercentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamCertification'); ?>
		<?php echo $form->checkBox($model,'ExamCertification'); ?>
		<?php echo $form->error($model,'ExamCertification'); ?>
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
		<?php echo $form->labelEx($model,'SubjectID'); ?>
		<?php echo $form->dropDownList($model, 'SubjectID', 
                        CHtml::listData(Subject::model()->findAll('Active=1'), 'SubjectID', 'SubjectName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'SubjectID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->