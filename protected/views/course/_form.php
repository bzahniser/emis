<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
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
		<?php if (Yii::app()->user->getState('ProgramID')===0)
                        {
                            $Array = CHtml::listData(Program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array( 'empty'=>'-- Select --'));
                        }
                        else 
                        {
                            $Cond='Active=1 and ProgramID='.Yii::app()->user->getState('ProgramID');
                            $model->ProgramID=Yii::app()->user->getState('ProgramID');
                            $Array = CHtml::listData(Program::model()->findAll($Cond), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array());
                        }
                ?>
		<?php echo $form->error($model,'ProgramID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseCode'); ?>
		<?php echo $form->textField($model,'CourseCode',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CourseCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseName'); ?>
		<?php echo $form->textField($model,'CourseName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CourseName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseDescription'); ?>
		<?php echo $form->textField($model,'CourseDescription',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CourseDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Provider'); ?>
		<?php echo $form->textField($model,'Provider',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'Provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsSchool'); ?>
		<?php echo $form->checkBox($model,'IsSchool'); ?>
		<?php echo $form->error($model,'IsSchool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CoordinatorID'); ?>
		<?php echo $form->dropDownList($model, 'CoordinatorID', 
                        CHtml::listData(Coordinator::model()->findAll('Active=1'), 'CoordinatorID', 'CoordinatorName'),
                        array('empty'=>'-- Select --'))
                ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseTypeID'); ?>
		<?php echo $form->dropDownList($model, 'CourseTypeID', 
                        CHtml::listData(CourseType::model()->findAll('Active=1'), 'CourseTypeID', 'CourseTypeName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'CourseTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseGroupID'); ?>
		<?php echo $form->dropDownList($model, 'CourseGroupID', 
                        CHtml::listData(CourseGroup::model()->findAll('Active=1'), 'GroupID', 'GroupName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'CourseGroupID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->