
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
            <?php echo $form->labelEx($modelSession,'CycleID'); ?>
            <?php 
                if ((int)Yii::app()->user->getState('SessionOnlyAttendance')===0)
                {
                    $Cond='Active=1 and CycleEnd=0';
                }
                else
                {
                    $Cond='Active=1 and CycleEnd=0 and FacilitatorID='.Yii::app()->user->getState('FacilitatorID');
                }
                
                $Array = CHtml::listData(Cycle::model()->findAll($Cond), 'CycleID', 'CycleName');
                echo $form->dropDownList($modelSession, 'CycleID',$Array,
                array( 'empty'=>'-- Select --',
                    'ajax' => array(
                         'type'=>'POST',
                         'url'=>CController::createUrl('Attendance/fillDate'),
                        'update'=>'#'.CHtml::activeId($modelSession,'SessionDate')
                        ),
                ));
                    
            ?>
            <?php echo $form->error($modelSession,'CycleID'); ?>
    </div>
    
    <div class="row">
		<?php echo $form->labelEx($modelSession,'SessionDate'); ?>
		<?php
                    $child=array();
                    
                    echo $form->dropDownList($modelSession,'SessionDate',$child,
                            array('prompt'=>'-- Select --',
                    'ajax' => array(
                         'type'=>'POST',
                         'url'=>CController::createUrl('Attendance/fillSubject'),
                        'update'=>'#'.CHtml::activeId($modelSession,'SubjectID')
                        ),
                    ));
                ?>
		<?php echo $form->error($modelSession,'SessionDate'); ?>
    </div>
    
    <div class="row">
		<?php echo $form->labelEx($modelSession,'SubjectID'); ?>
		<?php
                    $child=array();
                    
                    echo $form->dropDownList($modelSession,'SubjectID',$child,
                            array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($modelSession,'SubjectID'); ?>
	</div>
    
    <div class="row buttons">
		<?php echo CHtml::submitButton('Next'); ?>
    </div>
    
<?php $this->endWidget(); ?>
</div><!-- form -->