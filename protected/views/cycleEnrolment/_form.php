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
            <?php
            if(isset($errors))
            {
                $base_delay = 0;
                foreach($errors as $error)
                {
                    echo '<div class="flash-error">' .$error."</div>\n";
                }
            } ?>
        </div> 
        
        <div class="row">    
            <?php
            echo $form->labelEx($model, 'StudentID');
                $this->widget('EJuiAutoCompleteFkField', array(
                'model'=>$model, 
                'attribute'=>'StudentID', //the FK field (from CJuiInputWidget)
                // controller method to return the autoComplete data (from CJuiAutoComplete)
                'sourceUrl'=>Yii::app()->createUrl('/cycleenrolment/findPostCode'), 
                // defaults to false.  set 'true' to display the FK field with 'readonly' attribute.
                'showFKField'=>false,
                 // display size of the FK field.  only matters if not hidden.  defaults to 10
                'FKFieldSize'=>15, 
                'relName'=>'student', // the relation name defined above
                'displayAttr'=>'FullName',  // attribute or pseudo-attribute to display
                // length of the AutoComplete/display field, defaults to 50
                'autoCompleteLength'=>60,
                // any attributes of CJuiAutoComplete and jQuery JUI AutoComplete widget may 
                // also be defined.  read the code and docs for all options
                'options'=>array(
                    // number of characters that must be typed before 
                    // autoCompleter returns a value, defaults to 2
                    'minLength'=>2, 
                ),
           ));
           echo $form->error($model, 'StudentID');
            ?>
        </div>
        
        <div class="row">
	<?php echo $form->labelEx($model,'ProgramID'); ?>
		<?php if (Yii::app()->user->getState('ProgramID')===0)
                        {
                            $Array = CHtml::listData(program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array( 'empty'=>'-- Select --',
                                'ajax' => array(
                                     'type'=>'POST',
                                     'url'=>CController::createUrl('cycleEnrolment/fillCourse'),
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
                                 'url'=>CController::createUrl('CycleEnrolment/fillLevel'),
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
                                 'url'=>CController::createUrl('CycleEnrolment/fillCycle'),
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
                            array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'CycleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Transportation'); ?>
		<?php echo $form->checkBox($model,'Transportation'); ?>
		<?php echo $form->error($model,'Transportation'); ?>
	</div>
     
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->