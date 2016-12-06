<?php
/* @var $this CycleController */
/* @var $model Cycle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cycle-form',
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
		<?php if (Yii::app()->user->getState('ProgramID')===0)
                        {
                            $Array = CHtml::listData(program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array( 'empty'=>'-- Select --',
                                'ajax' => array(
                                     'type'=>'POST',
                                     'url'=>CController::createUrl('cycle/fillCourse'),
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
                                 'url'=>CController::createUrl('cycle/fillLevel'),
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
                            array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'LevelID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleName'); ?>
		<?php echo $form->textField($model,'CycleName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CycleName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CycleDescription'); ?>
		<?php echo $form->textField($model,'CycleDescription',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CycleDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CountryID'); ?>
		<?php echo $form->dropDownList($model, 'CountryID', 
                        CHtml::listData(Country::model()->findAll('Active=1'), 'CountryID', 'CountryName'),
                        array( 'empty'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('cycle/fillCity'),
                                'update'=>'#'.CHtml::activeId($model,'CityID')
                                ),
                        ));
                ?>
		<?php echo $form->error($model,'CountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CityID'); ?>
		<?php
                    $child=array();
                    if(isset($model->CountryID)){
                        $parent = intval($model->CountryID);
                        $list=City::model()->findAll("CountryID='$parent'");
                        $child = CHtml::listData($list,'CityID','CityName');
                    }
                    echo $form->dropDownList($model,'CityID',$child,
                            array('prompt'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('cycle/fillCenter'),
                                'update'=>'#'.CHtml::activeId($model,'CenterID')
                                ),
                            ));
                ?>
		<?php echo $form->error($model,'CityID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CenterID'); ?>
		<?php
                    $child=array();
                    if(isset($model->CityID)){
                        $parent = intval($model->CityID);
                        $list=Center::model()->findAll("CityID='$parent'");
                        $child = CHtml::listData($list,'CenterID','CenterName');
                    }
                    echo $form->dropDownList($model,'CenterID',$child,
                            array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'CenterID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Room'); ?>
		<?php echo $form->textField($model,'Room'); ?>
		<?php echo $form->error($model,'Room'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartDate'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'StartDate',
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
		<?php echo $form->error($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndDate'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'EndDate',
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
		<?php echo $form->error($model,'EndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AgeID'); ?>
		<?php echo $form->dropDownList($model, 'AgeID', 
                        CHtml::listData(AgeRange::model()->findAll('Active=1'), 'RangeID', 'RangeName'),
                        array( 'empty'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'AgeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AgeFlexability'); ?>
		<?php echo $form->textField($model,'AgeFlexability'); ?>
		<?php echo $form->error($model,'AgeFlexability'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumberOfStudent'); ?>
		<?php echo $form->textField($model,'NumberOfStudent'); ?>
		<?php echo $form->error($model,'NumberOfStudent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumberOfHours'); ?>
		<?php echo $form->textField($model,'NumberOfHours',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'NumberOfHours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FacilitatorID'); ?>
		<?php echo $form->dropDownList($model, 'FacilitatorID', 
                        CHtml::listData(Facilitator::model()->findAll('Active=1'), 'FacilitatorID', 'FacilitatorFullName'),
                        array( 'empty'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'FacilitatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CoordinatorID'); ?>
		<?php echo $form->dropDownList($model, 'CoordinatorID', 
                        CHtml::listData(Coordinator::model()->findAll('Active=1'), 'CoordinatorID', 'CoordinatorFullName'),
                        array( 'empty'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'CoordinatorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Transportation'); ?>
		<?php echo $form->checkBox($model,'Transportation'); ?>
		<?php echo $form->error($model,'Transportation'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Certification'); ?>
		<?php echo $form->checkBox($model,'Certification'); ?>
		<?php echo $form->error($model,'Certification'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'AttendancePerSubject'); ?>
		<?php echo $form->checkBox($model,'AttendancePerSubject'); ?>
		<?php echo $form->error($model,'AttendancePerSubject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->checkBox($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->