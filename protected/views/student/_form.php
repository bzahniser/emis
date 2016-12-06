<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
        
	<?php echo $form->errorSummary($model); ?>
        
        <?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Student Info
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
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
                            <?php echo $form->labelEx($model,'Name'); ?>
                            <?php echo $form->textField($model,'Name',array('size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($model,'Name'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'LastName'); ?>
                            <?php echo $form->textField($model,'LastName',array('size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($model,'LastName'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'ArabicName'); ?>
                            <?php echo $form->textField($model,'ArabicName',array('size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($model,'ArabicName'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'ArabicLastName'); ?>
                            <?php echo $form->textField($model,'ArabicLastName',array('size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($model,'ArabicLastName'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'DocumentTypeId'); ?>
                            <?php echo $form->dropDownList($model, 'DocumentTypeId', 
                                    CHtml::listData(DocumentType::model()->findAll('Active=1'), 'TypeID', 'TypeName'),
                                    array( 'empty'=>'-- Select --'));
                            ?>
                            <?php echo $form->error($model,'DocumentTypeId'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'DocumentId'); ?>
                            <?php echo $form->textField($model,'DocumentId',array('size'=>25,'maxlength'=>25)); ?>
                            <?php echo $form->error($model,'DocumentId'); ?>
                    </div>
          
                    <div class="row">
                            <?php echo $form->labelEx($model,'IsMale'); ?>
                            <?php   $Array = CHtml::listData(gender::model()->findAll(), 'GenderID', 'GenderName');
                                    echo $form->dropDownList($model, 'IsMale',$Array,
                                    array( 'empty'=>'-- Select --' )); ?>
                            <?php echo $form->error($model,'IsMale'); ?>
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
                                    'yearRange' => '1970:2020',     // range of year
                                ),
                                'htmlOptions' => array(
                                'size' => '10',         // textField size
                                'maxlength' => '10',    // textField maxlength
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model,'BirthDate'); ?>
                    </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Parent
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
                            
                            <?php echo $form->textField($model,'RelationDID',array('readonly'=>true)); ?>
                    <div class="row">
                            <?php echo $form->labelEx($model,'FatherIsAlive'); ?>
                            <?php echo $form->checkBox($model,'FatherIsAlive'); ?>
                            <?php echo $form->error($model,'FatherIsAlive'); ?>
                    </div>
          
                    <div class="row">
                            <?php  echo $form->labelEx($modelF,'FatherName'); ?>
                            <?php  echo $form->textField($modelF,'FatherName'); ?>
                            <?php  echo $form->error($modelF,'FatherName'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'MotherIsAlive'); ?>
                            <?php echo $form->checkBox($model,'MotherIsAlive'); ?>
                            <?php echo $form->error($model,'MotherIsAlive'); ?>
                    </div>
          
                    <div class="row">
                            <?php  echo $form->labelEx($modelF,'MotherFullName'); ?>
                            <?php  echo $form->textField($modelF,'MotherFullName'); ?>
                            <?php  echo $form->error($modelF,'MotherFullName'); ?>
                    </div>
                    
                    <div class="row">
                            <?php  echo $form->labelEx($modelF,'ParentPhone'); ?>
                            <?php  echo $form->textField($modelF,'ParentPhone'); ?>
                            <?php  echo $form->error($modelF,'ParentPhone'); ?>
                    </div>

                    <div class="row">
                            <?php  echo $form->labelEx($modelF,'ParentPhone2'); ?>
                            <?php  echo $form->textField($modelF,'ParentPhone2'); ?>
                            <?php  echo $form->error($modelF,'ParentPhone2'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'HouseHeadRelationID'); ?>
                            <?php echo $form->dropDownList($model, 'HouseHeadRelationID', 
                                    CHtml::listData(FamilyRelation::model()->findAll('Active=1'), 'RelationID', 'RelationName'),
                                    array( 'empty'=>'-- Select --'));
                            ?>
                            <?php echo $form->error($model,'HouseHeadRelationID'); ?>
                    </div>
          
                    <div class="row">
                            <?php echo $form->labelEx($model,'NumberOfPersons'); ?>
                            <?php echo $form->textField($model,'NumberOfPersons'); ?>
                            <?php echo $form->error($model,'NumberOfPersons'); ?>
                    </div>
          
                    <div class="row">
                            <?php echo $form->labelEx($model,'FamilyRelationID'); ?>
                            <?php echo $form->dropDownList($model, 'FamilyRelationID', 
                                    CHtml::listData(FamilyRelation::model()->findAll('Active=1'), 'RelationID', 'RelationName'),
                                    array( 'empty'=>'-- Select --'));
                            ?>
                            <?php echo $form->error($model,'FamilyRelationID'); ?>
                    </div>

                    <div class="row">
                            <?php  echo $form->labelEx($modelF,'DocumentTypeID'); ?>
                            <?php  
                                echo $form->dropDownList($modelF, 'DocumentTypeID', 
                                    CHtml::listData(DocumentType::model()->findAll('Active=1'), 'TypeID', 'TypeName'),
                                    array( 'empty'=>'-- Select --'));
                            ?>
                            <?php  echo $form->error($modelF,'DocumentTypeID'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($modelF,'DocumentID'); ?>
                            <?php echo $form->textField($modelF,'DocumentID'); ?>
                            <?php echo $form->error($modelF,'DocumentID'); ?>
                    </div>
          
                    <div class="row">
                            <?php  echo $form->labelEx($modelF,'RelativeName'); ?>
                            <?php  echo $form->textField($modelF,'RelativeName'); ?>
                            <?php  echo $form->error($modelF,'RelativeName'); ?>
                    </div>
          
                    <div class="row">
                            <?php  echo $form->labelEx($modelF,'RelativePhone'); ?>
                            <?php  echo $form->textField($modelF,'RelativePhone'); ?>
                            <?php  echo $form->error($modelF,'RelativePhone'); ?>
                    </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Geo Location
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
                    <div class="row">
                            <?php echo $form->labelEx($model,'BirthCountryID'); ?>
                            <?php 
                                    if (!isset($model->BirthCountryID))
                                    {
                                        $df = Yii::app()->db->createCommand()
                                                        ->select('DefaultValue')
                                                        ->from('tbl_user_default')
                                                        ->where('UserID=:id1 and FieldName=:id2', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'BirthCountryID'))
                                                        ->queryRow();
                                        $model->BirthCountryID=(int)$df['DefaultValue'];
                                    }
                                    echo $form->dropDownList($model, 'BirthCountryID', 
                                    CHtml::listData(Country::model()->findAll('Active=1'), 'CountryID', 'CountryName'),
                                    array( 'empty'=>'-- Select --'));
                            ?>
                            <?php echo $form->error($model,'BirthCountryID'); ?>
                    </div>
          
                    <div class="row">
                            <?php echo $form->labelEx($model,'CurrentCountryID'); ?>
                            <?php 
                                    if (!isset($model->CurrentCountryID))
                                    {
                                        $df = Yii::app()->db->createCommand()
                                                        ->select('DefaultValue')
                                                        ->from('tbl_user_default')
                                                        ->where('UserID=:id1 and FieldName=:id2', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'RgistrationCountryID'))
                                                        ->queryRow();
                                        $model->CurrentCountryID=(int)$df['DefaultValue'];
                                    }
                                    echo $form->dropDownList($model, 'CurrentCountryID', 
                                    CHtml::listData(Country::model()->findAll('Active=1'), 'CountryID', 'CountryName'),
                                    array( 'empty'=>'-- Select --',
                                        'ajax' => array(
                                             'type'=>'POST',
                                             'url'=>CController::createUrl('student/fillCurrentCity'),
                                            'update'=>'#'.CHtml::activeId($model,'CurrentCityID')
                                            ),
                                    ));
                                    
                            ?>
                     
                            <?php  $child=array();
                                if(isset($model->CurrentCountryID)){
                                    if (!isset($model->CurrentCityID))
                                    {
                                        $df = Yii::app()->db->createCommand()
                                                        ->select('DefaultValue')
                                                        ->from('tbl_user_default')
                                                        ->where('UserID=:id1 and FieldName=:id2', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'RgistrationCityID'))
                                                        ->queryRow();
                                        $model->CurrentCityID=(int)$df['DefaultValue'];
                                    }
                                    $parent = intval($model->CurrentCountryID);
                                    $list=City::model()->findAll("CountryID='$parent'");
                                    $child = CHtml::listData($list,'CityID','CityName');
                                }
                                echo $form->dropDownList($model,'CurrentCityID',$child,
                                        array('prompt'=>'-- Select --'));
                            ?>
                            <?php echo $form->error($model,'CurrentCityID'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'OriginalCountryID'); ?>
                            <?php 
                                    if (!isset($model->OriginalCountryID))
                                    {
                                        $df = Yii::app()->db->createCommand()
                                                        ->select('DefaultValue')
                                                        ->from('tbl_user_default')
                                                        ->where('UserID=:id1 and FieldName=:id2', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'OriginalCountryID'))
                                                        ->queryRow();
                                        $model->OriginalCountryID=(int)$df['DefaultValue'];
                                    }
                                    echo $form->dropDownList($model, 'OriginalCountryID', 
                                    CHtml::listData(Country::model()->findAll('Active=1'), 'CountryID', 'CountryName'),
                                    array( 'empty'=>'-- Select --',
                                        'ajax' => array(
                                             'type'=>'POST',
                                             'url'=>CController::createUrl('student/fillOriginalCity'),
                                            'update'=>'#'.CHtml::activeId($model,'OriginalCityID')
                                            ),
                                    ));
                            ?>
                     
                            <?php  $child=array();
                                if(isset($model->OriginalCountryID)){
                                    
                                    $parent = intval($model->OriginalCountryID);
                                    $list=City::model()->findAll("CountryID='$parent'");
                                    $child = CHtml::listData($list,'CityID','CityName');
                                }
                                echo $form->dropDownList($model,'OriginalCityID',$child,
                                        array('prompt'=>'-- Select --'));
                            ?>
                            <?php echo $form->error($model,'OriginalCityID'); ?>
                    </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          Study Info
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
                        <div class="row">
                                <?php echo $form->labelEx($model,'RegisteredinEducation'); ?>
                                <?php echo $form->checkBox($model,'RegisteredinEducation'); ?>
                                <?php echo $form->error($model,'RegisteredinEducation'); ?>
                        </div>

                        <div class="row">
                                <?php echo $form->labelEx($model,'OutOfSchool'); ?>
                                <?php echo $form->textField($model,'OutOfSchool'); ?>
                                <?php echo $form->error($model,'OutOfSchool'); ?>
                        </div>
                        <div class="row">
                                <?php echo $form->labelEx($model,'MedicalStatusID'); ?>
                                <?php echo $form->dropDownList($model, 'MedicalStatusID', 
                                        CHtml::listData(MedicalStatus::model()->findAll('Active=1'), 'StatusID', 'StatusName'),
                                        array( 'empty'=>'-- Select --'));
                                ?>
                                <?php echo $form->error($model,'MedicalStatusID'); ?>
                        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
          Other
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
                        <div class="row">
                                <?php echo $form->labelEx($model,'PhoneNumber'); ?>
                                <?php echo $form->textField($model,'PhoneNumber',array('size'=>25,'maxlength'=>25)); ?>
                                <?php echo $form->error($model,'PhoneNumber'); ?>
                        </div>

                        <div class="row">
                                <?php echo $form->labelEx($model,'Whatsup'); ?>
                                <?php echo $form->textField($model,'Whatsup',array('size'=>25,'maxlength'=>25)); ?>
                                <?php echo $form->error($model,'Whatsup'); ?>
                        </div>

                        <div class="row">
                                <?php echo $form->labelEx($model,'BenefitFromIRC'); ?>
                                <?php echo $form->checkBox($model,'BenefitFromIRC'); ?>
                                <?php echo $form->error($model,'BenefitFromIRC'); ?>
                        </div>

                        <div class="row">
                                <?php echo $form->labelEx($model,'BenfitIRCEdu'); ?>
                                <?php echo $form->checkBox($model,'BenfitIRCEdu'); ?>
                                <?php echo $form->error($model,'BenfitIRCEdu'); ?>
                        </div>

                        <div class="row">
                                <?php echo $form->labelEx($model,'MediaApproval'); ?>
                                <?php echo $form->checkBox($model,'MediaApproval'); ?>
                                <?php echo $form->error($model,'MediaApproval'); ?>
                        </div>
                        
                        <div class="row">
                                <?php echo $form->labelEx($model,'RefrenceID'); ?>
                                <?php echo $form->dropDownList($model, 'RefrenceID', 
                                        CHtml::listData(Reference::model()->findAll('Active=1'), 'RefrenceID', 'RefrenceName'),
                                        array( 'empty'=>'-- Select --'));
                                ?>
                                <?php echo $form->error($model,'RefrenceID'); ?>
                        </div>
          
                        <div class="row">
                                <?php echo $form->labelEx($model,'OldID'); ?>
                                <?php echo $form->textField($model,'OldID',array('size'=>25,'maxlength'=>25)); ?>
                                <?php echo $form->error($model,'OldID'); ?>
                        </div>

      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>

        <div class="row">    
                <?php if($model->isNewRecord) echo 'Enrol In' ?>
                <?php if($model->isNewRecord){
 
                $GridData =new CActiveDataProvider('Cycle', array(
                    'criteria'=>array(
                        'condition'=>"Active=1 and CycleEnd=0",  
                        ),
                    'pagination'=>array(
                        'pageSize'=>300,
                        ),
                    ));
                
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'assign-grid',
                    'dataProvider'=>$GridData,
                    'selectableRows' => 2,
                    //'filter'=>$model,
                    'columns'=>array(
                        array('id' => 'CycleID',
                            'class' => 'CCheckBoxColumn',),
                        'course.CourseName',
                        'level.LevelName',
                        'CycleName',
                        'StartDate',
                        'city.CityName',
                        'center.CenterName'
                        )));
  
                }?>
                <?php if($model->isNewRecord) echo $form->error($modelCycle,'CycleID'); ?>
        </div>
        
        <div class="row">    
                <?php if($model->isNewRecord) echo 'Waiting For' ?>
                <?php if($model->isNewRecord){
 
                $GridData2 =new CActiveDataProvider('Level', array(
                    'criteria'=>array(
                        'condition'=>"Active=1",  
                        ),
                    'pagination'=>array(
                        'pageSize'=>300,
                        ),
                    ));
                
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id'=>'assign-grid',
                    'dataProvider'=>$GridData2,
                    'selectableRows' => 2,
                    //'filter'=>$model,
                    'columns'=>array(
                        array('id' => 'LevelID',
                            'class' => 'CCheckBoxColumn',),
                        'course.CourseName',
                        'LevelName',
                        
                        )));
  
                }?>
                <?php if($model->isNewRecord) echo $form->error($modelLevel,'LevelID'); ?>
        </div>

        
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->