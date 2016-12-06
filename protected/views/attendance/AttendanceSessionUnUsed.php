
<?php

/* 
new CActiveDataProvider('Attendance', array(
                                'criteria' => array(
                                    'limit' => 100,
                                    'order' => 'CycleID'
                                )
                            ))
 */
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
    
        <?php echo $form->errorSummary($modelSession); ?>
    
        
        
        <div class="row">
                <?php echo $form->labelEx($modelCycle,'CycleName'); ?>
		<?php echo $form->textField($modelCycle,'CycleName',array('readonly'=>true)); ?>
		<?php echo $form->textField($modelSession,'SessionDate',array('readonly'=>true)); ?>
		<?php echo $form->textField($modelSession,'TimeFrom',array('readonly'=>true)); ?>
		<?php echo $form->textField($modelSession,'Active',array('readonly'=>true)); ?>
		
        </div>
    
        <div class="row">
            <?php
                $GridData =new CActiveDataProvider('Attendance', array(
                    'criteria'=>array(
                        'condition'=>"CycleID=".$modelSession->CycleID." and AttendanceDate='".$modelSession->SessionDate."'",  
                        ),
                    ));
                $this->widget(
                        'booster.widgets.TbExtendedGridView',
                        array(
                            'type' => 'striped bordered',
                            'dataProvider' => $GridData,
                            'columns' => array(
                                array('name' => 'student.FullName', 'header' => 'Student'),
                                array(
                                    'name' => 'Present',
                                    'header' => 'Present',
                                    'class' => 'booster.widgets.TbEditableColumn',
                                    'headerHtmlOptions' => array('style' => 'width:200px'),
                                    'editable' => array(
                                        'type' => array('text'),
                                        'url' => $this->createUrl('/attendance/editable'),
                                        'mode' => 'inline',
                        )),
                        )));  
                ?>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
 