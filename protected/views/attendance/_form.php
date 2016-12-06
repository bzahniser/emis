<?php
/* @var $this AttendanceController */
/* @var $model Attendance */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendance-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
                <?php echo $form->labelEx($modelCycle,'CycleName'); ?>
		<?php echo $form->textField($modelCycle,'CycleName',array('size'=>25,'maxlength'=>25,'readonly'=>true)); ?>
		<?php echo $form->error($modelCycle,'CycleName'); ?>
            
                <?php echo $form->labelEx($modelSession,'SessionDate'); ?>
		<?php echo $form->textField($modelSession,'SessionDate',array('readonly'=>true)); ?>
		<?php echo $form->error($modelSession,'SessionDate'); ?>
	</div>
        
        <?php
            echo $form->labelEx($model, 'StudentID');
                $this->widget('EJuiAutoCompleteFkField', array(
                'model'=>$model, 
                'attribute'=>'StudentID', //the FK field (from CJuiInputWidget)
                // controller method to return the autoComplete data (from CJuiAutoComplete)
                'sourceUrl'=>Yii::app()->createUrl('/attendance/findPostCode'), 
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
        
	<div class="row">
		<?php echo $form->labelEx($model,'Present'); ?>
		<?php echo $form->checkBox($model,'Present'); ?>
		<?php echo $form->error($model,'Present'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->