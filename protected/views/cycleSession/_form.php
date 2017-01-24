<?php
/* @var $this CycleSessionController */
/* @var $model CycleSession */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cycle-session-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
	<?php echo $form->labelEx($model,'ProgramID'); ?>
		<?php if (Yii::app()->user->getState('ProgramID')===0)
                        {
                            $Array = CHtml::listData(Program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array( 'empty'=>'-- Select --',
                                'ajax' => array(
                                     'type'=>'POST',
                                     'url'=>CController::createUrl('CycleSession/fillCourse'),
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
                                 'url'=>CController::createUrl('CycleSession/fillLevel'),
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
                                 'url'=>CController::createUrl('CycleSession/fillCycle'),
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
                                 'url'=>CController::createUrl('CycleSession/fillSubject'),
                                'update'=>'#'.CHtml::activeId($model,'SubjectID')
                                ),
                            ));
                ?>
		<?php echo $form->error($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubjectID'); ?>
		<?php
                    $child=array();
                    if(isset($model->LevelID)){
                        $parent = $model->LevelID;
                        $c = new CDbCriteria;
                        $c->select = ['t.SubjectID, t.SubjectName'];
                       // $c->from=["tbl_mstr_subject t"];
                        $c->join = "INNER JOIN tbl_level_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
                        $c->compare("b.LevelID", $parent);

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
		<?php echo $form->labelEx($model,'SessionDate'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'SessionDate',
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
		<?php echo $form->error($model,'SessionDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TimeFrom'); ?>
		<?php echo $form->textField($model,'TimeFrom'); ?>
		<?php echo $form->error($model,'TimeFrom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TimeTo'); ?>
		<?php echo $form->textField($model,'TimeTo'); ?>
		<?php echo $form->error($model,'TimeTo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FacilitatorID'); ?>
		<?php echo $form->dropDownList($model, 'FacilitatorID', 
                        CHtml::listData(Facilitator::model()->findAll('Active=1'), 'FacilitatorID', 'FacilitatorName'),
                        array( 'empty'=>'-- Select --' ));
                ?>
		<?php echo $form->error($model,'FacilitatorID'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'SessionCanceld'); ?>
		<?php echo $form->checkBox($model,'SessionCanceld'); ?>
		<?php echo $form->error($model,'SessionCanceld'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'SessionDeleted'); ?>
		<?php echo $form->checkBox($model,'SessionDeleted'); ?>
		<?php echo $form->error($model,'SessionDeleted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->