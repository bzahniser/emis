<?php
/* @var $this FacilitatorController */
/* @var $model Facilitator */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'facilitator-form',
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
		<?php  
                    if (Yii::app()->user->getState('ProgramID')===0)
                        {
                            $Array = CHtml::listData(program::model()->findAll('Active=1'), 'ProgramID', 'ProgramName');
                            echo $form->dropDownList($model, 'ProgramID',$Array,
                            array( 'empty'=>'-- Select --' ));
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
		<?php echo $form->labelEx($model,'FacilitatorName'); ?>
		<?php echo $form->textField($model,'FacilitatorName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'FacilitatorName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FacilitatorLastName'); ?>
		<?php echo $form->textField($model,'FacilitatorLastName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'FacilitatorLastName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BirthDate'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'BirthDate',
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
                        'showOtherMonths' => true,      // show dates in other months
                        'selectOtherMonths' => true,    // can seelect dates in other months
                        'changeYear' => true,           // can change year
                        'changeMonth' => true,          // can change month
                        'yearRange' => '1940:2000',     // range of year
                    ),
                    'htmlOptions' => array(
                    'size' => '10',         // textField size
                    'maxlength' => '10',    // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'BirthDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EducationLevel'); ?>
		<?php echo $form->textField($model,'EducationLevel',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'EducationLevel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentTypeID'); ?>
		<?php  $Array = CHtml::listData(documentType::model()->findAll('Active=1'), 'TypeID', 'TypeName');
                        echo $form->dropDownList($model, 'DocumentTypeID',$Array,
                        array( 'empty'=>'-- Select --',)
                     );
                ?>
		<?php echo $form->error($model,'DocumentTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DocumentID'); ?>
		<?php echo $form->textField($model,'DocumentID',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'DocumentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsMale'); ?>
		<?php   $Array = CHtml::listData(gender::model()->findAll(), 'GenderID', 'GenderName');
                        echo $form->dropDownList($model, 'IsMale',$Array,
                        array( 'empty'=>'-- Select --' )); ?>
		<?php echo $form->error($model,'IsMale'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'FacilitatorGroupID'); ?>
		<?php echo $form->dropDownList($model, 'FacilitatorGroupID', 
                        CHtml::listData(FacilitatorGroup::model()->findAll('Active=1'), 'GroupID', 'GroupName'),
                        array( 'empty'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'CountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CountryID'); ?>
		<?php echo $form->dropDownList($model, 'CountryID', 
                        CHtml::listData(Country::model()->findAll('Active=1'), 'CountryID', 'CountryName'),
                        array( 'empty'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('facilitator/fillCity'),
                                'update'=>'#'.CHtml::activeId($model,'CityID')
                                ),
                        ));
                ?>
		<?php echo $form->error($model,'CountryID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CityID'); ?>
		<?php
                    $citys=array();
                    if(isset($model->CountryID)){
                        $country = intval($model->CountryID);
                        $list=City::model()->findAll("CountryID='$country'");
                        $citys = CHtml::listData($list,'CityID','CityName');
                    }
                    echo $form->dropDownList($model,'CityID',$citys,array('prompt'=>'-- Select --'));
                ?>
		<?php echo $form->error($model,'CityID'); ?>
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
		<?php echo $form->labelEx($model,'HourPerDay'); ?>
		<?php echo $form->textField($model,'HourPerDay'); ?>
		<?php echo $form->error($model,'HourPerDay'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'HourPerMonth'); ?>
		<?php echo $form->textField($model,'HourPerMonth'); ?>
		<?php echo $form->error($model,'HourPerMonth'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'PhoneNumber'); ?>
		<?php echo $form->textField($model,'PhoneNumber'); ?>
		<?php echo $form->error($model,'PhoneNumber'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Whatsup'); ?>
		<?php echo $form->textField($model,'Whatsup'); ?>
		<?php echo $form->error($model,'Whatsup'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->