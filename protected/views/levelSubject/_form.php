<?php
/* @var $this LevelSubjectController */
/* @var $model LevelSubject */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'level-subject-form',
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
                            array( 'empty'=>'-- Select --',
                                'ajax' => array(
                                     'type'=>'POST',
                                     'url'=>CController::createUrl('LevelSubject/fillCourse'),
                                    'update'=>'#'.CHtml::activeId($model,'CourseID')
                                    ),
                            ));
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
		<?php echo $form->labelEx($model,'CourseID'); ?>
		<?php
                    $child=array();
                    if(isset($model->ProgramID)){
                        $parent = intval($model->ProgramID);
                        $list=Course::model()->findAll("ProgramID='$parent'");
                        $child = CHtml::listData($list,'CourseID','CourseName');
                    }
                    echo $form->dropDownList($model,'CourseID',$child,
                            array('prompt'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('LevelSubject/fillLevel'),
                                'update'=>'#'.CHtml::activeId($model,'LevelID')
                                ),
                            ));
                ?>
		<?php echo $form->error($model,'CourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LevelID'); ?>
		<?php
                    $child=array();
                    if(isset($model->CourseID)){
                        $parent = intval($model->CourseID);
                        $list=Level::model()->findAll("CourseID='$parent'");
                        $child = CHtml::listData($list,'LevelID','LevelName');
                    }
                    echo $form->dropDownList($model,'LevelID',$child,
                            array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'LevelID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubjectID'); ?>
		<?php echo $form->dropDownList($model, 'SubjectID', 
                        CHtml::listData(Subject::model()->findAll('Active=1'), 'SubjectID', 'SubjectName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'SubjectID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubjectWieght'); ?>
		<?php echo $form->textField($model,'SubjectWieght'); ?>
		<?php echo $form->error($model,'SubjectWieght'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->