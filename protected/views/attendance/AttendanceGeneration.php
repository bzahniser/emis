<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */

$this->menu=array(
        array('label'=>'Students', 'url'=>array('Student/admin')),
	array('label'=>'Add Student', 'url'=>array('Student/create')),
        array('label'=>'Leave', 'url'=>array('Leave/admin')),
        array('label'=>'New Leave', 'url'=>array('Leave/create')),
        array('label'=>'Enrollment', 'url'=>array('CycleEnrolment/admin')),
        array('label'=>'Enrol', 'url'=>array('CycleEnrolment/create')),
        array('label'=>'Waiting List', 'url'=>array('Waiting/admin')),
        array('label'=>'Add to Waiting', 'url'=>array('Waiting/create')),
        array('label'=>'Attendance', 'url'=>array('Attendance/admin')),
        array('label'=>'Session Attendance', 'url'=>array('Attendance/AttendanceSessionSelect')),
    
);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">    
               
                <?php {
                if ((int)Yii::app()->user->getState('SessionOnlyAttendance')===0)
                    $con=" SessionID=".$modelSession->SessionID;
                else
                    $con=" SessionID=".$modelSession->SessionID.' and FacilitatorID='.Yii::app()->user->getState('FacilitatorID');
                $GridData =new CActiveDataProvider('VAttendanceGeneration', array(
                    'criteria'=>array(
                        'condition'=>$con,  
                        ),
                    'pagination'=>array(
                        'pageSize'=>300,
                        ),
                    'sort'=>  array(
                        'defaultOrder'=>'FullName'
                    )
                    ));
                
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'assign-grid',
                    'dataProvider'=>$GridData,
                    'selectableRows' => 2,
                    //'filter'=>$model,
                    'columns'=>array(
                        
                        array('id' => 'ID',
                            'class' => 'CCheckBoxColumn',
                            'value'=>'$data->ID',
                            'checked'=>'$data->Present',
                            ),
                        'FullName',
                        'ArabicFullName',
                        )));
  
                }?>
               
        </div>
        

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
    
    <?php $this->endWidget(); ?>

</div><!-- form -->