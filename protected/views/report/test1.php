
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
        <?php
        if(isset($errors))
        {
            $base_delay = 0;
            foreach($errors as $error)
            {
                echo '<div class="flash-error">' .$error."</div>\n";
            }
        } ?>
    </div>
    
    <div class="row buttons"> ?>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div><!-- form -->
