
<?php
    
    $GridData =new CActiveDataProvider('VCycleExam', array(
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
                    array('name' => 'Pre', 'header' => 'Pre'),
                    array('name' => 'Mid', 'header' => 'Mid'),
                    array('name' => 'Post', 'header' => 'Post'),
                    array('name' => 'Score', 'header' => 'Full Score'),
                    array('name' => 'PassingScore', 'header' => 'Passing Score'),
                    array('name' => 'SubjectName', 'header' => 'Subject Name'),
                    array('name' => 'MapActive', 'header' => 'Active'),
                    
               
            )));  
    ?>
