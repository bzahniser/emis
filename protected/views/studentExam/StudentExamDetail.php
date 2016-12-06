
<?php
    $Con='StudentID='.$studentid;
    $GridData =new CActiveDataProvider('VExamScore', array(
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

                    array('name' => 'ExamName', 'header' => 'Exam'),
                    array('name' => 'SubjectName', 'header' => 'Subject Name'),
                    array('name' => 'Pre', 'header' => 'Pre'),
                    array('name' => 'Mid', 'header' => 'Mid'),
                    array('name' => 'Post', 'header' => 'Post'),
                    array('name' => 'TotalScore', 'header' => 'Full Score'),
                    array('name' => 'PassingScore', 'header' => 'Passing Score'),
                    array('name' => 'StudentScore', 'header' => 'Student Score'),
                    
                    
                    
               
            )));  
    ?>
