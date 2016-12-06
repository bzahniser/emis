
<?php
    $Con='CycleID='.$model->CycleID;
    $GridData =new CActiveDataProvider('VCycleSubject', array(
            'criteria'=>array(
                'condition'=>$Con,  
                ),
            ));
    $this->widget(
            'booster.widgets.TbExtendedGridView',
            array(
                'type' => 'striped bordered',
                'dataProvider' => $GridData,
                'columns' => array(
                    array('name' => 'CycleName', 'header' => 'Cycle'),
                    array('name' => 'StartDate', 'header' => 'Start'),
                    array('name' => 'EndDate', 'header' => 'End'),
                    array('name' => 'SubjectName', 'header' => 'Subject'),
                    
               
            )));  
    ?>
