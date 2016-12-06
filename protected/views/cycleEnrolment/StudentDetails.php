
    
     
            <?php
                $Pth=  substr($_SERVER['PATH_INFO'],0,5 );
                if ($Pth==='/Stud')
                    $con="StudentID=".$model->StudentID;
                else
                    $con="CycleID=".$model->CycleID;
                $GridData =new CActiveDataProvider('VStudentCycleSummary', array(
                        'criteria'=>array('condition'=>$con,),));
                $this->widget(
                        'booster.widgets.TbExtendedGridView',
                        array(
                            'type' => 'striped bordered',
                            'dataProvider' => $GridData,
                            'columns' => array(
                                array('name' => 'FullName', 'header' => 'Student'),
                                array('name' => 'CycleName', 'header' => 'Cycle'),
                                array('name' => 'StartDate', 'header' => 'Start'),
                                //array('name' => 'EndDate', 'header' => 'End'),
                                array('name' => 'Withdrawl', 'header' => 'Dr'),
                                array('name' => 'Cycl', 'header' => 'Se'),
                                array('name' => 'Present', 'header' => 'Pr'),
                                array('name' => 'Absent', 'header' => 'Ab'),
                                array('name' => 'Leav', 'header' => 'Lv'),
                        )));  
                ?>
