<?php
/* @var $this LevelController */
/* @var $model Level */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'level-form',
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
                <?php   
                        if (Yii::app()->user->getState('ProgramID')===0)
                        {
                            $Array = CHtml::listData(program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array( 'empty'=>'-- Select --',
                                'ajax' => array(
                                     'type'=>'POST',
                                     'url'=>CController::createUrl('level/fillCourse'),
                                    'update'=>'#'.CHtml::activeId($model,'CourseID')
                                    ),
                            ));
                        }
                        else 
                        {
                            $Cond='Active=1 and ProgramID='.Yii::app()->user->getState('ProgramID');
                            $model->ProgramID=Yii::app()->user->getState('ProgramID');
                            $Array = CHtml::listData(program::model()->findAll($Cond), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array());
                        }
                         ?>
                <?php echo $form->error($model,'ProgramID'); ?>
                
        </div>

        <div class="row">
		<?php echo $form->labelEx($model,'CourseID'); ?>
                <?php
                    $courses=array();
                    //if(isset($model->CourseID)){
                        $program = intval($model->ProgramID);
                        $list=Course::model()->findAll("ProgramID='$program'");
                        $courses = CHtml::listData($list,'CourseID','CourseName');
                    //}
                    echo $form->dropDownList($model,'CourseID',$courses,array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'CourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LevelName'); ?>
		<?php echo $form->textField($model,'LevelName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'LevelName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LevelDescription'); ?>
		<?php echo $form->textField($model,'LevelDescription',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'LevelDescription'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'LevelCertification'); ?>
		<?php echo $form->checkBox($model,'LevelCertification'); ?>
		<?php echo $form->error($model,'LevelCertification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RangeID'); ?>
		<?php echo $form->dropDownList($model, 'RangeID', 
                        CHtml::listData(AgeRange::model()->findAll('Active=1'), 'RangeID', 'RangeName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'RangeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AgeFlexability'); ?>
		<?php echo $form->textField($model,'AgeFlexability'); ?>
		<?php echo $form->error($model,'AgeFlexability'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumberOfHours'); ?>
		<?php echo $form->textField($model,'NumberOfHours'); ?>
		<?php echo $form->error($model,'NumberOfHours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CoordinatorID'); ?>
		<?php echo $form->dropDownList($model, 'CoordinatorID', 
                        CHtml::listData(Coordinator::model()->findAll('Active=1'), 'CoordinatorID', 'CoordinatorName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'CoordinatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Sequence'); ?>
		<?php echo $form->textField($model,'Sequence'); ?>
		<?php echo $form->error($model,'Sequence'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->