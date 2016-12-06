
<?php
echo 'Total :'.($Presnts+$Absents).' ';
echo 'Present :'.$Presnts.' ';
echo 'Absent :'.$Absents;

$this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
    'options' => array(
        'chart'=> array('type'=> 'pie'),
        'title' => array('text' => 'Attendance Sccussfuly Saved'),
        'tooltip'=> array('pointFormat'=> '{series.name}: <b>{point.percentage:.1f}%</b>'),
        'plotOptions'=> array(
            'pie'=> array(
                'allowPointSelect'=> true,
                'cursor'=> 'pointer',
                'dataLabels'=>array(
                    'enabled'=> true,
                    'format'=> '<b>{point.name}</b>: {point.percentage:.1f} %',
                    'style'=>array('color'=> "Highcharts.theme && Highcharts.theme.contrastTextColor ||'black'" ))
            )),
        'series' => array(
            array(
                'name' => 'Attendance', 
                'data' => array(
                    array('name'=>'Present','y'=>(int)$Presnts),
                    array('name'=>'Absent','y'=>(int)$Absents)
                ),
            ),
            
        ),
        'credits'=>array('enabled'=> false),
         
        //'plotOptions'=>array(
        //    'column'=>array('stacking'=> 'percent')
       // ),
    
   )
));

?>