<?php
/* @var $this CenterController */
/* @var $model Center */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'center-form',
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
                            array( 'empty'=>'-- Select --'));
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
		<?php echo $form->labelEx($model,'CenterName'); ?>
		<?php echo $form->textField($model,'CenterName',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CenterName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CountryID'); ?>
		<?php echo $form->dropDownList($model, 'CountryID', 
                        CHtml::listData(Country::model()->findAll('Active=1'), 'CountryID', 'CountryName'),
                        array( 'empty'=>'-- Select --',
                            'ajax' => array(
                                 'type'=>'POST',
                                 'url'=>CController::createUrl('center/fillCity'),
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
		<?php echo $form->labelEx($model,'CoordinatorID'); ?>
		<?php echo $form->dropDownList($model, 'CoordinatorID', 
                        CHtml::listData(Coordinator::model()->findAll('Active=1'), 'CoordinatorID', 'CoordinatorFullName'),
                        array('empty'=>'-- Select --'))
                ?>
		<?php echo $form->error($model,'CoordinatorID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->