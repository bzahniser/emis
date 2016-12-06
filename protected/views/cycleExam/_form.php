<?php
/* @var $this CycleExamController */
/* @var $model CycleExam */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cycle-exam-form',
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
                                     'url'=>CController::createUrl('cycleexam/fillCourse'),
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
                                 'url'=>CController::createUrl('CycleExam/fillLevel'),
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
                            array('prompt'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('CycleExam/fillCycle'),
                                'update'=>'#'.CHtml::activeId($model,'CycleID')
                                ),
                            ));
                ?>
		<?php echo $form->error($model,'LevelID'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'CycleID'); ?>
		<?php
                    $child=array();
                    if(isset($model->LevelID)){
                        $parent = intval($model->LevelID);
                        $list=Cycle::model()->findAll("LevelID='$parent'");
                        $child = CHtml::listData($list,'CycleID','CycleName');
                    }
                    echo $form->dropDownList($model,'CycleID',$child,
                            array('prompt'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('CycleExam/fillExam'),
                                'update'=>'#'.CHtml::activeId($model,'ExamID')
                                ),
                            ));
                ?>
		<?php echo $form->error($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ExamID'); ?>
		<?php
                    $child=array();
                    if(isset($model->LevelID)){
                        $parent = $model->LevelID;
                        $c = new CDbCriteria;
                        $c->select = ['t.ExamID, t.ExamName'];
                       // $c->from=["tbl_mstr_subject t"];
                        $c->join = "INNER JOIN tbl_level_exam b ON t.ExamID = b.ExamID and b.Active=1";
                        $c->compare("b.LevelID", $parent);

                        $list=Exam::model()->findAll($c);
                        //$list=Subject::model()->findAll("LevelID='$parent'");
                        $child = CHtml::listData($list,'ExamID','ExamName');
                    }
                    echo $form->dropDownList($model,'ExamID',$child,
                            array('prompt'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('CycleExam/fillSubject'),
                                'update'=>'#'.CHtml::activeId($model,'SubjectID')
                                ),
                            ));
                ?>
		<?php echo $form->error($model,'ExamID'); ?>
	</div>
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'SubjectID'); ?>
		<?php
                    $child=array();
                    if(isset($model->CycleID)){
                        $parent = $model->CycleID;
                        $c = new CDbCriteria;
                        $c->select = ['t.SubjectID, t.SubjectName'];
                       // $c->from=["tbl_mstr_subject t"];
                        $c->join = "INNER JOIN tbl_cycle_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
                        $c->compare("b.CycleID", $parent);

                        $list=Subject::model()->findAll($c);
                        //$list=Subject::model()->findAll("LevelID='$parent'");
                        $child = CHtml::listData($list,'SubjectID','SubjectName');
                    }
                    echo $form->dropDownList($model,'SubjectID',$child,
                            array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'SubjectID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pre'); ?>
		<?php echo $form->checkBox($model,'Pre'); ?>
		<?php echo $form->error($model,'Pre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Post'); ?>
		<?php echo $form->checkBox($model,'Post'); ?>
		<?php echo $form->error($model,'Post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Mid'); ?>
		<?php echo $form->checkBox($model,'Mid'); ?>
		<?php echo $form->error($model,'Mid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Score'); ?>
		<?php echo $form->textField($model,'Score',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PassingScore'); ?>
		<?php echo $form->textField($model,'PassingScore',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PassingScore'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PassingRequired'); ?>
		<?php echo $form->checkBox($model,'PassingRequired'); ?>
		<?php echo $form->error($model,'PassingRequired'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->