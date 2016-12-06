<?php
/* @var $this StudentExamController */
/* @var $model StudentExam */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-exam-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="form">
        <div class="row">    
            <?php
            echo $form->labelEx($model, 'StudentID');
                $this->widget('EJuiAutoCompleteFkField', array(
                'model'=>$model, 
                'attribute'=>'RelatedID', //the FK field (from CJuiInputWidget)
                // controller method to return the autoComplete data (from CJuiAutoComplete)
                'sourceUrl'=>Yii::app()->createUrl('/student/findPostCode'), 
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
    
        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->