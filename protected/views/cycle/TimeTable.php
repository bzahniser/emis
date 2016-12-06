
<?php


    $this->widget('application.extensions.EFullCalendar.EFullCalendar', array(
        'themeCssFile'=>'cupertino/theme.css',
        'htmlOptions'=>array(
            'style'=>'width:100%'
        ),
        'options'=>array(
            'header'=>array(
                'left'=>'prev,next',
                'center'=>'title',
                'right'=>'today'
            ),
            'lazyFetching'=>true,
            'events'=>$eventArray
        )
    ));
?>
