
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attendance-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
      
        <div class="row">
            <?php
                if((int)$typ===1)
                    $con="Pre=1 and Mid=0 and Post=0 ";
                else if ((int)$typ===2)
                    $con="Pre=0 and Mid=1 and Post=0 ";
                else
                    $con="Pre=0 and Mid=0 and Post=1 ";
                $GridData =new CActiveDataProvider('StudentExam', array(
                    'criteria'=>array(
                        'condition'=>"CycleID=".$id." and ExamID=".$id2." and ".$con,  
                        ),
                    ));
                $this->widget(
                        'booster.widgets.TbExtendedGridView',
                        array(
                            'type' => 'striped bordered',
                            'dataProvider' => $GridData,
                            'columns' => array(
                                array('name' => 'student.FullName', 'header' => 'Student'),
                                array('name' => 'subject.SubjectName', 'header' => 'Subject'),
                                array(
                                    'name' => 'StudentScore',
                                    'header' => 'Score',
                                    'class' => 'booster.widgets.TbEditableColumn',
                                    'headerHtmlOptions' => array('style' => 'width:200px'),
                                    'editable' => array(
                                        'type' => array('text'),
                                        'url' => $this->createUrl('/studentexam/editable'),
                                        'mode' => 'inline',
                        )),
                        )));  
                ?>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
 