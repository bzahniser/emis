
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'level-exam-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <div class="row">
            <?php echo $form->labelEx($modelExam,'CycleID'); ?>
            <?php 
                if ((int)Yii::app()->user->getState('SessionOnlyExam')===0)
                {
                    $Cond='Active=1 and CycleEnd=0';
                }
                else
                {
                    $Cond='Active=1 and CycleEnd=0 and FacilitatorID='.Yii::app()->user->getState('FacilitatorID');
                }
                
                $Array = CHtml::listData(cycle::model()->findAll($Cond), 'CycleID', 'CycleName');
                echo $form->dropDownList($modelExam, 'CycleID',$Array,
                array( 'empty'=>'-- Select --',
                    'ajax' => array(
                         'type'=>'POST',
                         'url'=>CController::createUrl('StudentExam/fillExam'),
                        'update'=>'#'.CHtml::activeId($modelExam,'ExamID')
                        ),
                ));
                    
            ?>
            <?php echo $form->error($modelExam,'CycleID'); ?>
    </div>
    
    <div class="row">
		<?php echo $form->labelEx($modelExam,'ExamID'); ?>
		<?php
                    //$Array = CHtml::listData(exam::model()->findAll('Active=1 and ExamID in (SELECT ExamID FROM tbl_cycle_Exam WHERE CycleID'), 'ExamID', 'ExamName');
                    echo $form->dropDownList($modelExam, 'ExamID',array());
                ?>
		<?php echo $form->error($modelExam,'ExamID'); ?>
    </div>
   
    <div class="row">
		<?php echo $form->labelEx($modelExam,'ExamDate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $modelExam,
                    'attribute' => 'ExamDate',
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
		<?php echo $form->error($modelExam,'ExamDate'); ?>
    </div>
    
    <div class="row">
		<?php echo $form->labelEx($modelExam,'ExamTime'); ?>
		<?php $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelExam,
                        'attribute' => 'ExamTime',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>9,
                            'minuteGrid' => 15,
                            'timeFormat' => 'h:m',
                            'changeMonth' => true,
                            'changeYear' => false,

                         ) ,                                       
                        'htmlOptions' => array(                    
                            'autocomplete' => 'off',                  
                            'size' => 10,                     
                            'maxlength' => 10,                        
                        ),                                        
                    ));
                ?>
		<?php echo $form->error($modelExam,'ExamTime'); ?>
    </div>
    
    <p class="note">Exam Type <span class="required">*</span></p>
   
    <div class="row">
    <?php  echo $form->dropDownList($modelExam, 'StudentScore',
              array('1' => 'Pre', '2' => 'Mid', '3' => 'Post'),
              array('empty' => '-- Select --'))
    ?>
    </div>

    <div class="row buttons">
		<?php echo CHtml::submitButton(); ?>
    </div>
    
<?php $this->endWidget(); ?>
</div><!-- form -->