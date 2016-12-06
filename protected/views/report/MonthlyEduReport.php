<head>
    <?php
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/MonthlyDash.css'); ?>
</head>
<?php $this->breadcrumbs=array('Reports'=>array('test1'),'Monthly',);?>



<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    )); ?>
    

<div class="com">
            <?php 
                
                echo CHtml::dropDownList('Year', $yer, array('2016'=>'2016','2017'=>'2017'));
                echo CHtml::dropDownList('Month', $mnth, array(
                                            '1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June',
                                            '7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'));
                $typs = array('2'=>'Informal','1'=>'Formal');
                echo CHtml::dropDownList('Typ', $tp,$typs );
                echo CHtml::submitButton('Refresh',array('style' => 'width: 120px; border-radius: 10px;'));
            ?>
            
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

<div class="vertical-text1"> New </div>
<div class="vertical-text2"> Running </div>
<div class="vertical-text3"> Current </div>
<div class="text1"> Facilitators </div>
<div class="text2"> Students </div>
<div class="text3"> Enrollment </div>

<!-- Generate New Table -->
<div class="row">  
    <?php
        $nw = Yii::app()->db->createCommand()
                ->select(" cnfg.ConfigName,cnfg.Sort id,dt.y,dt.m,coalesce(n1.Cnt,0) Cnt,coalesce(n2.Cnt,0) preCnt ")
                ->from(" (select distinct y,m from tbl_Calendar) dt ")
                ->crossJoin("tbl_report_summar_tables_config cnfg")
                ->leftjoin('V_Reporting_Monthly_New n1','dt.y=n1.y and dt.m=n1.m and cnfg.ConfigID=n1.Typ and cnfg.CourseTypeID=coalesce(n1.CourseTypeID,0)')
                ->leftjoin('V_Reporting_Monthly_New n2','dt.y=n2.y and dt.m-1=n2.m and cnfg.ConfigID=n2.Typ and cnfg.CourseTypeID=coalesce(n2.CourseTypeID,0)')
                ->where(" dt.m=".$mnth." and dt.y=".$yer.' and cnfg.CourseTypeID in ('.$tp.',0) and tabelID=1')
                ->order('cnfg.Sort')
                ->queryAll();
      
        $Grd = new CArrayDataProvider($nw);
        $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$Grd,
                //'type' => 'bordered striped',
                'summaryText' => '',
                'htmlOptions'=>array('style' => 'width:25%; position: relative;left: 35px; top: -60px;'),
                'columns'=>array(
                    array('name'=>'ConfigName','header'=>'',),
                    array('name'=>'Cnt','header'=>'Cur',/*'htmlOptions' => array('style' => 'width: 35px;')*/),
                    array('name'=>'preCnt','header'=>'Pre',/*'htmlOptions' => array('style' => 'width: 35px;')*/),
                    )
              ));
    ?>
</div>

<!-- Generate Running table -->
<div class="row" >  
    <?php
        $nw = Yii::app()->db->createCommand()
                ->select(" e.ConfigName,e.Sort id,a.y,a.m,a.Cnt,b.Cnt preCnt ")
                ->from(" tbl_report_summar_tables_config as e ")
                ->leftjoin('v_reporting_monthly_running a','e.ConfigID=a.Typ and e.CourseTypeID=a.CourseTypeID')
                ->leftjoin('v_reporting_monthly_running b','a.Typ=b.Typ and a.CourseTypeID=b.CourseTypeID and a.DT=b.DT+1')
                ->where(" a.m=".$mnth." and a.y=".$yer.' and e.CourseTypeID ='.$tp.' and e.tabelID=2')
                ->order('e.Sort')
                ->queryAll();
      
        $Grd = new CArrayDataProvider($nw);
        $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$Grd,
                //'type' => 'bordered striped',
                'summaryText' => '',
                'htmlOptions'=>array('style' => 'width:25%; position: relative;left: 35px; top: -115px;'),
                'columns'=>array(
                    array('name'=>'ConfigName','header'=>'',/*'htmlOptions' => array('style' => 'width: 25px;')*/),
                    array('name'=>'Cnt','header'=>'Cur',/*'htmlOptions' => array('style' => 'width: 35px;')*/),
                    array('name'=>'preCnt','header'=>'Pre',/*'htmlOptions' => array('style' => 'width: 35px;')*/),
                    )
              ));
    ?>
</div>

<!-- Generate Current table -->
<div class="row">  
    <?php
        $Cu = Yii::app()->db->createCommand()
                ->select(" cnfg.ConfigName,cnfg.Sort id,dt.y,dt.m,coalesce(n1.Cnt,0) Cnt,coalesce(n2.Cnt,0) preCnt ")
                ->from(" (select distinct y,m from tbl_Calendar) dt ")
                ->crossJoin("tbl_report_summar_tables_config cnfg")
                ->leftjoin('V_Reporting_Monthly_current n1','dt.y=n1.y and dt.m=n1.m and cnfg.ConfigID=n1.Typ and cnfg.CourseTypeID=coalesce(n1.CourseTypeID,0)')
                ->leftjoin('V_Reporting_Monthly_current n2','dt.y=n2.y and dt.m-1=n2.m and cnfg.ConfigID=n2.Typ and cnfg.CourseTypeID=coalesce(n2.CourseTypeID,0)')
                ->where(" dt.m=".$mnth." and dt.y=".$yer.' and cnfg.CourseTypeID in ('.$tp.',0) and tabelID=3')
                ->order('cnfg.Sort')
                ->queryAll();
        $Grd = new CArrayDataProvider($Cu);
        $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$Grd,
                //'type' => 'bordered striped',
                'summaryText' => '',
                'htmlOptions'=>array('style' => 'width:25%; position: relative;left: 35px; top: -167px;'),
                'columns'=>array(
                    array('name'=>'ConfigName','header'=>'',/*'htmlOptions' => array('style' => 'width: 25px;')*/),
                    array('name'=>'Cnt','header'=>'Cur',/*'htmlOptions' => array('style' => 'width: 35px;')*/),
                    array('name'=>'preCnt','header'=>'Pre',/*'htmlOptions' => array('style' => 'width: 35px;')*/),
                    )
              ));
    ?>
</div>

<!-- Generate Facilitator Bars -->
<div class="c1">  
    <?php
        $df = Yii::app()->db->createCommand()
                ->select("s.*,t.FacilitatorGroupID")
                ->from('tbl_report_Facilitator_Time_Summary s')
                ->leftJoin('tbl_facilitator t', 's.FacilitatorID=t.FacilitatorID')
                ->where(" t.FacilitatorGroupID=".$tp." and FacilitatorActive=1 and m=".$mnth." and y=".$yer)
                ->order('FacilitatorName')
                //->where('UserID=:id1 and FieldName=:id2 and ProgramID=:id3', array(':id1'=>1, ':id2'=>'RgistrationCityID', ':id3'=>$model->ProgramID))
                ->queryAll();

        $r=0;
        $idl=array();
        $act=array();
        $pln=array();
        $cat=array();
        if (isset($df[0]['Idl']))
            for ($i=0;$i<count($df);$i++) {
                $cat[$r]=$df[$i]['FacilitatorName']; 
                $idl[$r]=(int)$df[$i]['Idl']; 
                $act[$r]=(int)$df[$i]['Act'];
                $pln[$r]=(int)$df[$i]['Pln'];
                $r++;
            }

        $dat[0]['data']=$idl;
        $dat[0]['name']='Ideal';
        $dat[0]['showInLegend']=false;
        $dat[1]['data']=$pln;
        $dat[1]['name']='Plan';
        $dat[1]['showInLegend']=false;
        $dat[2]['data']=$act;
        $dat[2]['name']='Actual';
        $dat[2]['showInLegend']=false;
        //$categories = array('Jul', 'Aug', 'Sep','Oct','Nov');

        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'column','width'=> 400,'height'=> 200,// 'position'=>'relative', 'left'=>'35px', 'top'=> '-160px'
                    ),
                'title' => array('text' => ''),
                'xAxis' => array(
                        'title' => array(
                            'text' => '',
                           ),
                        'categories'=> $cat,
                    ),
                    'yAxis' => array(
                       'title' => array(
                            'text' => 'Monthly Hours',
                           ),
                    'stackLabels'=>array(
                            'enabled'=>true,
                            )
                    ),
                'tooltip' => array(
                    'formatter' => "js:function(){ return  this.series.name; }"
                 ),
                'series' => $dat,
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'column'=>array(
                        'stacking'=> 'normal',
                        'dataLabels'=>array(
                            'enabled'=> true,
                            )
                        )
                ),

           )
        ));
    ?>
</div>

<!-- Gender Age Analysis Student -->
<div class="c2">
     <?php  
        $GenData = Yii::app()->db->createCommand()
            ->select("ConfigName name,sum(Cnt) y")
            ->from('v_reporting_monthly_running_student_gender_age_summary')
            ->group('y,m,ID,ConfigName,TabelID,Sort,CourseTypeID')
            ->having(" m=".$mnth." and y=".$yer." and CourseTypeID in (".$tp.",0) and tabelID=5")
            ->order('Sort')
            ->queryAll();

        $AgeData= Yii::app()->db->createCommand()
            ->select("RangeName name,sum(Cnt) y")
            ->from('v_reporting_monthly_running_student_gender_age_summary')
            ->group('y,m,ID,ConfigName,TabelID,Sort,CourseTypeID,RangeName')
            ->having(" m=".$mnth." and y=".$yer." and CourseTypeID in (".$tp.",0) and tabelID=5 ")
            ->order('Sort,ID')
            ->queryAll();

        for($h=0;$h<count($GenData);$h++)
            $GenData[$h]['y']=(int)$GenData[$h]['y'];
        
        for($h=0;$h<count($AgeData);$h++)
            $AgeData[$h]['y']=(int)$AgeData[$h]['y'];
        
        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'pie','width'=>160,'height'=> 160, 'spacingTop'=>-22,'spacingBottom'=>-22,  'spacingLeft'=>-22,'spacingRight'=>-22,
                ),
                'title' => array('text' => ''),
                'yAxis' => array(),
                'series' => array(
                    array(
                        'name'=> 'Gender',
                        'data'=> $GenData,
                        'size'=> '60%',
                    ),
                    array(
                        'name'=> 'Ages',
                        'data'=> $AgeData,
                        'size'=> '80%',
                        'innerSize'=> '60%',
                    )
                ),
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'pie'=>array(
                        'dataLabels'=>array(
                            'enabled'=> true,
                            //'format'=> '<b> {point.percentage:.1f} %',
                            'distance'=> -20,
                            ),
                        'shadow'=> false,
                        //'center'=>array('50px','75px'),
                        )
                ),

           )
        ));

    ?>
</div>

<!-- Gender Age Analysis Enrollment -->
<div class="c3">
     <?php  
        $GenData = Yii::app()->db->createCommand()
            ->select("ConfigName name,sum(CntGen) y")
            ->from('v_reporting_monthly_running_gender_age_summary')
            ->group('y,m,ID,ConfigName,TabelID,Sort,CourseTypeID')
            ->having(" m=".$mnth." and y=".$yer." and CourseTypeID in (".$tp.",0) and tabelID=5")
            ->order('Sort')
            ->queryAll();

        $AgeData= Yii::app()->db->createCommand()
            ->select("RangeName name,sum(CntAge) y")
            ->from('v_reporting_monthly_running_gender_age_summary')
            ->group('y,m,ID,ConfigName,TabelID,Sort,CourseTypeID,RangeName')
            ->having(" m=".$mnth." and y=".$yer." and CourseTypeID in (".$tp.",0) and tabelID=5 ")
            ->order('Sort,ID')
            ->queryAll();

        for($h=0;$h<count($GenData);$h++)
            $GenData[$h]['y']=(int)$GenData[$h]['y'];
        
        for($h=0;$h<count($AgeData);$h++)
            $AgeData[$h]['y']=(int)$AgeData[$h]['y'];
        
        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'pie','width'=>160,'height'=> 160, 'spacingTop'=>-22,'spacingBottom'=>-22,  'spacingLeft'=>-22,'spacingRight'=>-22,
                ),
                'title' => array('text' => ''),
                'yAxis' => array(),
                'series' => array(
                    array(
                        'name'=> 'Gender',
                        'data'=> $GenData,
                        'size'=> '60%',
                    ),
                    array(
                        'name'=> 'Ages',
                        'data'=> $AgeData,
                        'size'=> '80%',
                        'innerSize'=> '60%',
                    )
                ),
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'pie'=>array(
                        'dataLabels'=>array(
                            'enabled'=> true,
                            //'format'=> '<b> {point.percentage:.1f} %',
                            'distance'=> -20,
                            ),
                        'shadow'=> false,
                        //'center'=>array('50px','75px'),
                        )
                ),

           )
        ));

    ?>
    </div>

<div class="text4"> English </div>
<!-- English Enrollment -->
<div class="c4"> 
    <?php
    if((int)$tp===2)
    {
        $rows=Yii::app()->db->createCommand()
            ->select("CourseID,CourseName,LevelID,LevelName,GenderName,count(*) Cnt")
            ->from('V_Enrollment_Details')
            ->group('CourseID,CourseName,LevelID,LevelName,GenderName')
            ->where(" ".$yer."*12+".$mnth.">=month(StartDate)+year(StartDate)*12 and ".$yer."*12+".$mnth."<=month(EndDate)+year(EndDate)*12 and CourseTypeID=".$tp)
            ->queryAll();

        $r=0;
        $rowsData=array(
                'Turkish'=>array('Course'=>'Turkish',
                    'cat'=>array('Beginner'=>0,'Intermediate'=>1,'Advanced'=>2,'lvl'=>array('Beginner','Intermediate','Advanced')),
                    'Series'=>array(
                        array('data'=>array(0,0,0),'name'=>'Male','showInLegend'=>false),
                        array('data'=>array(0,0,0),'name'=>'Femal','showInLegend'=>false),
                    ),
                ),
                'English'=>array('Course'=>'English',
                    'cat'=>array('Beginner'=>0,'Intermediate'=>1,'Advanced'=>2,'Advanced'=>3,'lvl'=>array('Beginner','Intermediate','Advanced','TOEFL')),
                    'Series'=>array(
                        array('data'=>array(0,0,0,0),'name'=>'Male','showInLegend'=>false),
                        array('data'=>array(0,0,0,0),'name'=>'Femal','showInLegend'=>false),
                    ),
                ),
                'Computer'=>array('Course'=>'Computer',
                    'cat'=>array('Photoshop'=>0,'Office'=>1,'lvl'=>array('Photoshop','Office')),
                    'Series'=>array(
                        array('data'=>array(0,0),'name'=>'Male','showInLegend'=>false),
                        array('data'=>array(0,0),'name'=>'Femal','showInLegend'=>false),
                    ),
                ),
            );
        
        if (isset($rows))
            for ($i=0;$i<count($rows);$i++) {
                if($rows[$i]['GenderName']=='Male')
                    $num1=0;
                else if($rows[$i]['GenderName']=='Femal')
                    $num1=1;
                
                if ($rows[$i]['CourseName']==='TOEFL')
                    $rows[$i]['CourseName']='English';
                if ($rows[$i]['CourseName']==='Photoshop' or $rows[$i]['CourseName']==='Office')
                {
                    $rows[$i]['LevelName']=$rows[$i]['CourseName'];
                    $rows[$i]['CourseName']='Computer';
                }
                
                $num=$rowsData[$rows[$i]['CourseName']]['cat'][$rows[$i]['LevelName']];
                
                $rowsData[$rows[$i]['CourseName']]['Series'][$num1]['data'][$num]=(int)$rows[$i]['Cnt'];
                $rowsData[$rows[$i]['CourseName']]['Series'][$num1]['data'][$num]=(int)$rows[$i]['Cnt'];
            }
        
         $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'column','width'=> 200,'height'=> 200,
                    ),
                'title' => array('text' => ''),
                'xAxis' => array(
                        'title' => array(
                            'text' => '',
                           ),
                        'categories'=> $rowsData['English']['cat']['lvl'],
                    ),
                    'yAxis' => array(
                       'title' => array(
                            'text' => '',
                           ),
                    'stackLabels'=>array(
                            'enabled'=>true,
                            )
                    ),
                'tooltip' => array(
                    'formatter' => "js:function(){ return  this.series.name; }"
                 ),
                'series' => $rowsData['English']['Series'],
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'column'=>array(
                        'stacking'=> 'normal',
                        'dataLabels'=>array(
                            'enabled'=> true,
                            )
                        )
                ),

           )
        ));
    }
    ?>
</div>

<!-- English Attendance -->
<div class="c5"> 
    <?php
    if((int)$tp===2)
    {
        
        $AttenData = Yii::app()->db->createCommand()
            ->select("CourseName,"
                    . "sum(case when `SessionCanceld`=1 then 1 else Present end) Present,"
                    . "sum(case when `SessionCanceld`=1 then 0 when Leav=1 then 0 else Absent end) Absent")
            ->from("V_Attendance_Details")
            ->where("month(SessionDate)=".$mnth
                ." and year(SessionDate)=".$yer
                ." and CourseTypeID=".$tp
                ." and Vacation=0"
                ." and CourseName='English' ")
            ->group('CourseName')
            ->queryRow();
        if(!$AttenData)
        {
            $AttenData['Present']=0;
            $AttenData['Absent']=0;
        }
        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'pie','width'=>120,'height'=> 120, 'spacingTop'=>-10,'spacingBottom'=>-10,  'spacingLeft'=>-10,'spacingRight'=>-10,
                    'plotBackgroundColor'=> null,
                    'plotBorderWidth'=> null,
                    'plotShadow'=> false,
                    ),
                'title' => array('text' => ''),
                'tooltip' => array(
                    'formatter' => "js:function(){ return  this.point.name; }"
                 ),
                'series' => array(
                    array('data'=>array(
                            array('name'=>'Present','y'=>(int)$AttenData['Present']),
                            array('name'=>'Absent','y'=>(int)$AttenData['Absent']),
                        ),
                    ),),
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'pie'=>array(
                        'dataLabels'=>array(
                            'enabled'=> true,
                            'format'=> '<b> {point.percentage:.1f} %',
                            'distance'=> -50,
                            )
                        )
                ),

           )
        ));
    }
    ?>
</div>

<div class="text5"> Turkish </div>
<!-- Turkish Enrollment -->
<div class="c6"> 
    <?php
    if((int)$tp===2)
    {
        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'column','width'=> 200,'height'=> 200,
                    ),
                'title' => array('text' => ''),
                'xAxis' => array(
                        'title' => array(
                            'text' => '',
                           ),
                        'categories'=> $rowsData['Turkish']['cat']['lvl'],
                    ),
                    'yAxis' => array(
                       'title' => array(
                            'text' => '',
                           ),
                    'stackLabels'=>array(
                            'enabled'=>true,
                            )
                    ),
                'tooltip' => array(
                    'formatter' => "js:function(){ return  this.series.name; }"
                 ),
                'series' => $rowsData['Turkish']['Series'],
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'column'=>array(
                        'stacking'=> 'normal',
                        'dataLabels'=>array(
                            'enabled'=> true,
                            )
                        )
                ),

           )
        ));
    }
    ?>
</div>

<!-- Turkish Attendance -->
<div class="c7"> 
    <?php
    if((int)$tp===2)
    {
        
        $AttenData = Yii::app()->db->createCommand()
            ->select("CourseName,"
                    . "sum(case when `SessionCanceld`=1 then 1 else Present end) Present,"
                    . "sum(case when `SessionCanceld`=1 then 0 when Leav=1 then 0 else Absent end) Absent")
            ->from("V_Attendance_Details")
            ->where("month(SessionDate)=".$mnth
                ." and year(SessionDate)=".$yer
                ." and CourseTypeID=".$tp
                ." and Vacation=0"
                ." and CourseName='Turkish' ")
            ->group('CourseName')
            ->queryRow();
        
        if(!$AttenData)
        {
            $AttenData['Present']=0;
            $AttenData['Absent']=0;
        }
        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'pie','width'=>120,'height'=> 120, 'spacingTop'=>-10,'spacingBottom'=>-10,  'spacingLeft'=>-10,'spacingRight'=>-10,
                    'plotBackgroundColor'=> null,
                    'plotBorderWidth'=> null,
                    'plotShadow'=> false,
                    ),
                'title' => array('text' => ''),
                'tooltip' => array(
                    'formatter' => "js:function(){ return  this.point.name; }"
                 ),
                'series' => array(
                    array('data'=>array(
                            array('name'=>'Present','y'=>(int)$AttenData['Present']),
                            array('name'=>'Absent','y'=>(int)$AttenData['Absent']),
                        ),
                    ),),
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'pie'=>array(
                        'dataLabels'=>array(
                            'enabled'=> true,
                            'format'=> '<b> {point.percentage:.1f} %',
                            'distance'=> -50,
                            )
                        )
                ),

           )
        ));
    }
    ?>
</div>

<div class="text6"> Computer </div>
<!-- Computer Enrollment -->
<div class="c8"> 
    <?php
    if((int)$tp===2)
    {
        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'column','width'=> 200,'height'=> 200,
                    ),
                'title' => array('text' => ''),
                'xAxis' => array(
                        'title' => array(
                            'text' => '',
                           ),
                        'categories'=> $rowsData['Computer']['cat']['lvl'],
                    ),
                    'yAxis' => array(
                       'title' => array(
                            'text' => '',
                           ),
                    'stackLabels'=>array(
                            'enabled'=>true,
                            )
                    ),
                'tooltip' => array(
                    'formatter' => "js:function(){ return  this.series.name; }"
                 ),
                'series' => $rowsData['Computer']['Series'],
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'column'=>array(
                        'stacking'=> 'normal',
                        'dataLabels'=>array(
                            'enabled'=> true,
                            )
                        )
                ),

           )
        ));
    }
    ?>
</div>

<!-- Computer Attendance -->
<div class="c9"> 
    <?php
    if((int)$tp===2)
    {
        
        $AttenData = Yii::app()->db->createCommand()
            ->select("CourseName,"
                    . "sum(case when `SessionCanceld`=1 then 1 else Present end) Present,"
                    . "sum(case when `SessionCanceld`=1 then 0 when Leav=1 then 0 else Absent end) Absent")
            ->from("V_Attendance_Details")
            ->where("month(SessionDate)=".$mnth
                ." and year(SessionDate)=".$yer
                ." and CourseTypeID=".$tp
                ." and Vacation=0"
                ." and CourseName='Computer' ")
            ->group('CourseName')
            ->queryRow();
        
        if(!$AttenData)
        {
            $AttenData['Present']=0;
            $AttenData['Absent']=0;
        }
        $this->Widget('ext.yii-highcharts.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart'=> array('type'=> 'pie','width'=>120,'height'=> 120, 'spacingTop'=>-10,'spacingBottom'=>-10,  'spacingLeft'=>-10,'spacingRight'=>-10,
                    'plotBackgroundColor'=> null,
                    'plotBorderWidth'=> null,
                    'plotShadow'=> false,
                    ),
                'title' => array('text' => ''),
                'tooltip' => array(
                    'formatter' => "js:function(){ return  this.point.name; }"
                 ),
                'series' => array(
                    array('data'=>array(
                            array('name'=>'Present','y'=>(int)$AttenData['Present']),
                            array('name'=>'Absent','y'=>(int)$AttenData['Absent']),
                        ),
                    ),),
                'credits'=>array('enabled'=> false),
                'plotOptions'=>array(
                    'pie'=>array(
                        'dataLabels'=>array(
                            'enabled'=> true,
                            'format'=> '<b> {point.percentage:.1f} %',
                            'distance'=> -50,
                            )
                        )
                ),

           )
        ));
    }
    ?>
</div>