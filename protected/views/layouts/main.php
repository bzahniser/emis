<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	
	<div id="mainmenu">
		<?php
                        $MenuAray=array();
                        $MenuAray[0]=array('label'=>'Home', 'url'=>array('/site/index'),'visible'=>true);
                        if(Yii::app()->user->isGuest)
                            $MenuAray[1]=array('label'=>'Login', 'url'=>array('/site/login'),'visible'=>true);
                        else
                        {
                            $UserMnu=Yii::app()->db->createCommand()
                                ->from("tbl_user_menu")
                                ->where('UserID='.Yii::app()->user->getState('userid'))
                                ->queryRow();
                            if((int)$UserMnu['StudentMenu']===1)
                                $MenuAray[1]=array('label'=>'Student', 'url'=>array('/Student/admin'),'visible'=>true);
                            if((int)$UserMnu['CycleMenu']===1)
                                $MenuAray[2]=array('label'=>'Cycle', 'url'=>array('/Cycle/admin'),'visible'=>true);
                            if((int)$UserMnu['CourseMenu']===1)
                                $MenuAray[3]=array('label'=>'Course', 'url'=>array('/Course/admin'),'visible'=>true);
                            if((int)$UserMnu['MasterMenu']===1)
                                $MenuAray[4]=array('label'=>'Master', 'url'=>array('/site/Master'),'visible'=>true);
                            if((int)$UserMnu['SettingsMenu']===1)
                                $MenuAray[5]=array('label'=>'Settings', 'url'=>array('/site/Settings'),'visible'=>true);
                             if((int)$UserMnu['TodayList']===1)
                                $MenuAray[6]=array('label'=>"Todays List", 'url'=>array('/attendance/DailyStudentList'),'visible'=>true);
                            if((int)$UserMnu['AttendanceMenu']===1)
                                $MenuAray[7]=array('label'=>"Attendance Entry", 'url'=>array('/attendance/AttendanceSessionSelect'),'visible'=>true);
                            $MenuAray[8]=array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'),'visible'=>true);
                            $MenuAray[]=array('label'=>'Password ('.Yii::app()->user->name.')', 'url'=>array('/user/changeMyPassword'),'visible'=>true);
                            //
                        }

                        $this->widget('zii.widgets.CMenu',array(
			'items'=>$MenuAray,
		)); ?>
	</div><!-- mainmenu -->

</ul>
        <?php 
        if(!Yii::app()->user->isGuest and (int)$UserMnu['SideMenu']===1)
        {
        $this->beginWidget('application.extensions.leftsidebar.leftSidebar', array('title' => 'Menu', 'collapsed' => true));
            echo "<div> <br> </div>";   
            echo "<div> <a color='black' href='".Yii::app()->baseUrl."/index.php/Student/create'> <font size=2 color=#100> <b>.  Register Student </b> </b> </font> </a> </div>";
            echo "<div> <a color='black' href='".Yii::app()->baseUrl."/index.php/Student/CopyFromBrotherSelect'> <font size=2 color=#100> <b>.  Copy to New Student </b> </b> </font> </a> </div>";
            echo "<div> <a color='black' href='".Yii::app()->baseUrl."/index.php/CycleEnrolment/create'> <font size=2 color=#100> <b>.  Enrol Student </b> </font> </a> </div>";
            echo "<div> <a color='black' href='".Yii::app()->baseUrl."/index.php/Waiting/create'> <font size=2 color=#100> <b>.  Add to Waiting</b> </font> </a> </div>";
            echo "<div> <font color=#ffc525> <b> ---------------------------------- </b> </font> </div>";
            echo "<div> <a color='black' href='".Yii::app()->baseUrl."/index.php/Attendance/AttendanceSessionSelect'> <font size=2 color=#100> <b>.  Attendance Entry </b> </font> </a> </div>";
            echo "<div> <font color=#ffc525> <b> ---------------------------------- </b> </font> </div>";
            echo "<div> <a color='black' href='".Yii::app()->baseUrl."/index.php/Cycle/create'> <font size=2 color=#100> <b>.  New Cycle </b> </font> </a> </div>";
            echo "<div> <font color=#ffc525> <b> ---------------------------------- </b> </font> </div>";
            echo "<div> <a color='black' href='".Yii::app()->baseUrl."/index.php/Studentexam/ExamSessionSelect'> <font size=2 color=#100> <b>.  Exam Score</b> </font> </a> </div>";
            echo "<div> <br> </div>";
            
        $this->endWidget();
        }?>
        
       
   
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by IRC.<br/>
		
		Powered By IRC Turkey -Education Team-
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
    