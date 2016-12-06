<?php
/* 

 */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'weekSession-form',
	
)); ?>

<div class="form">
    
    <div class="row">
            <?php echo CHtml::activelabel($model,'CycleName') ?>
            <?php echo CHtml::activeTextField($model, 'CycleName',array('readonly'=>true)) ?>
            <?php echo CHtml::activeTextField($model, 'CycleDescription',array('readonly'=>true)) ?>
    </div>

    <div class="row">
            <?php echo CHtml::label('Cycle Start/End','Cycle Start/End')?>
            <?php echo CHtml::activeTextField($model, 'StartDate',array('readonly'=>true)) ?>
            <?php echo CHtml::activeTextField($model, 'EndDate',array('readonly'=>true)) ?>
    </div>

    <div class="row">
            <?php if(!$model->CycleEnd) echo CHtml::activeLabel($modelWeek,'Mondy'); ?>

            <?php 
                if(!$model->CycleEnd)
                {
                    echo CHtml::activeCheckBox($modelWeek, 'IsMon');
                    echo ' ';
                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'MonFrom',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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
                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'MonTo',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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
                }
            ?>
            <?php 
                if(!$model->CycleEnd)
                {
                    $c = new CDbCriteria;
                    $c->select = ['t.SubjectID, t.SubjectName'];
                    $c->join = "INNER JOIN tbl_cycle_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
                    $c->compare("b.CycleID", $model->CycleID);
                    $list=Subject::model()->findAll($c);
                    $child = CHtml::listData($list,'SubjectID','SubjectName');
                    echo $form->dropDownList($modelWeek,'MonSub',$child,
                            array('prompt'=>'-- Select Subject--'));
                    
                    $list=  Facilitator::model()->findAll('Active=1');
                    $child = CHtml::listData($list,'FacilitatorID','FacilitatorName');
                    echo $form->dropDownList($modelWeek,'MonFaci',$child,
                            array('prompt'=>'-- Select Facilitator--'));
                }
            ?>
    </div>

    <div class="row">
            <?php if(!$model->CycleEnd) echo CHtml::activeLabel($modelWeek,'Tuesday'); ?>
            <?php
                if(!$model->CycleEnd)
                {
                    echo CHtml::activeCheckBox($modelWeek, 'IsTue');
                    echo ' ';
                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'TueFrom',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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

                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'TueTo',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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
                }
            ?>
            <?php 
                if(!$model->CycleEnd)
                {
                    $c = new CDbCriteria;
                    $c->select = ['t.SubjectID, t.SubjectName'];
                    $c->join = "INNER JOIN tbl_cycle_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
                    $c->compare("b.CycleID", $model->CycleID);
                    $list=Subject::model()->findAll($c);
                    $child = CHtml::listData($list,'SubjectID','SubjectName');
                    echo $form->dropDownList($modelWeek,'TueSub',$child,
                            array('prompt'=>'-- Select Subject--'));
                    
                    $list=  Facilitator::model()->findAll('Active=1');
                    $child = CHtml::listData($list,'FacilitatorID','FacilitatorName');
                    echo $form->dropDownList($modelWeek,'TueFaci',$child,
                            array('prompt'=>'-- Select Facilitator--'));
                }
            ?>
    </div>

    <div class="row">
            <?php if(!$model->CycleEnd) echo CHtml::activeLabel($modelWeek,'Wednsday'); ?>
            <?php
                if(!$model->CycleEnd)
                {
                    echo CHtml::activeCheckBox($modelWeek, 'IsWed');
                    echo ' ';
                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'WedFrom',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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

                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'WedTo',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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
                }
            ?>
            <?php 
                if(!$model->CycleEnd)
                {
                    $c = new CDbCriteria;
                    $c->select = ['t.SubjectID, t.SubjectName'];
                    $c->join = "INNER JOIN tbl_cycle_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
                    $c->compare("b.CycleID", $model->CycleID);
                    $list=Subject::model()->findAll($c);
                    $child = CHtml::listData($list,'SubjectID','SubjectName');
                    echo $form->dropDownList($modelWeek,'WedSub',$child,
                            array('prompt'=>'-- Select Subject--'));
                    
                    $list=  Facilitator::model()->findAll('Active=1');
                    $child = CHtml::listData($list,'FacilitatorID','FacilitatorName');
                    echo $form->dropDownList($modelWeek,'WedFaci',$child,
                            array('prompt'=>'-- Select Facilitator--'));
                }
            ?>
    </div>

    <div class="row">
            <?php if(!$model->CycleEnd) echo CHtml::activeLabel($modelWeek,'Thursday'); ?>
            <?php
                if(!$model->CycleEnd)
                {
                    echo CHtml::activeCheckBox($modelWeek, 'IsThu');
                    echo ' ';
                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'ThuFrom',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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

                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'ThuTo',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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
                }
            ?>
            <?php 
                if(!$model->CycleEnd)
                {
                    $c = new CDbCriteria;
                    $c->select = ['t.SubjectID, t.SubjectName'];
                    $c->join = "INNER JOIN tbl_cycle_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
                    $c->compare("b.CycleID", $model->CycleID);
                    $list=Subject::model()->findAll($c);
                    $child = CHtml::listData($list,'SubjectID','SubjectName');
                    echo $form->dropDownList($modelWeek,'ThuSub',$child,
                            array('prompt'=>'-- Select Subject--'));
                    
                    $list=  Facilitator::model()->findAll('Active=1');
                    $child = CHtml::listData($list,'FacilitatorID','FacilitatorName');
                    echo $form->dropDownList($modelWeek,'ThuFaci',$child,
                            array('prompt'=>'-- Select Facilitator--'));
                }
            ?>
    </div>

    <div class="row">
            <?php if(!$model->CycleEnd) echo CHtml::activeLabel($modelWeek,'Friday'); ?>
            <?php
                if(!$model->CycleEnd)
                {
                    echo CHtml::activeCheckBox($modelWeek, 'IsFri');
                    echo ' ';
                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'FriFrom',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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

                    $this->widget( 'application.extensions.jui.EJuiDateTimePicker', array(
                        'model' => $modelWeek,
                        'attribute' => 'FriTo',
                        'options' => array(
                            'showOn'=>'focus',    
                            'timeOnly' => true,
                            'hourMax'=>17,
                            'hourMin'=>7,
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
                }
            ?>
            <?php 
                if(!$model->CycleEnd)
                {
                    $c = new CDbCriteria;
                    $c->select = ['t.SubjectID, t.SubjectName'];
                    $c->join = "INNER JOIN tbl_cycle_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
                    $c->compare("b.CycleID", $model->CycleID);
                    $list=Subject::model()->findAll($c);
                    $child = CHtml::listData($list,'SubjectID','SubjectName');
                    echo $form->dropDownList($modelWeek,'FriSub',$child,
                            array('prompt'=>'-- Select Subject--'));
                    
                    $list=  Facilitator::model()->findAll('Active=1');
                    $child = CHtml::listData($list,'FacilitatorID','FacilitatorName');
                    echo $form->dropDownList($modelWeek,'FriFaci',$child,
                            array('prompt'=>'-- Select Facilitator--'));
                }
            ?>
    </div>  
   
    <div class="row">

        <?php 
        if(!$model->CycleEnd)
        {
            echo CHtml::submitButton('Generate Sessions'); 
        }?>
    </div>
</div>

<?php $this->endWidget(); ?>