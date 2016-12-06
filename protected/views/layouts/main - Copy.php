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
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				
			),
		)); ?>
	</div><!-- mainmenu -->

   <ul id="menu">
    <li><a href="/IEMS/index.php/site/index">Home</a></li>
    
    <li>
        <a href="#">Student</a>
        <ul>
            <li><a href="/IEMS/index.php/Student/admin">Student</a></li>
            <li><a href="/IEMS/index.php/Document/admin">Document</a></li>
            <li><a href="/IEMS/index.php/CycleEnrolment/admin">Enrolment</a></li>
            <li><a href="/IEMS/index.php/Waiting/admin">Waiting</a></li>
			<li><a href="/IEMS/index.php/Leave/admin">Leave</a></li>
            <li><a href="/IEMS/index.php/Attendance/admin">Attendance</a></li>
            <li><a href="/IEMS/index.php/Attendance/admin">A.Attendance</a></li>
            <li><a href="/IEMS/index.php/StudentExam/admin">Exam</a></li>
        </ul>
    </li>
 
    <li>
        <a href="#">Cycle</a>
        <ul>
            <li><a href="/IEMS/index.php/Cycle/admin">Cycle</a></li>
            <li><a href="/IEMS/index.php/CycleSubject/admin">Cycle Subject</a></li>
            <li><a href="/IEMS/index.php/CycleExam/admin">Cycle Exam</a></li>
            <li><a href="/IEMS/index.php/CycleSchedualHeader/admin">Cycle Schedual</a></li>
            <li><a href="/IEMS/index.php/CycleSchedualHeader/admin">Cycle Schedual Change</a></li>
            
        </ul>
    </li>
    
    <li>
        <a href="#">Course</a>
        <ul>
            <li><a href="/IEMS/index.php/Course/admin">Course</a></li>
            <li><a href="/IEMS/index.php/Level/admin">Level</a></li>
            <li><a href="/IEMS/index.php/LevelSubject/admin">Level Subject</a></li>
            <li><a href="/IEMS/index.php/LevelExam/admin">Level Exam</a></li>
        </ul>
    </li>
    
    <li>
        <a href="#">Master</a>
        <ul>
            <li><a href="/IEMS/index.php/Program/admin">Program</a></li>
            <li><a href="/IEMS/index.php/Subject/admin">Subject</a></li>
            <li><a href="/IEMS/index.php/Exam/admin">Exam</a></li>
            <li><a href="/IEMS/index.php/Coordinator/admin">Coordinator</a></li>
            <li><a href="/IEMS/index.php/Facilitator/admin">Facilitator</a></li>
            <li><a href="/IEMS/index.php/Center/admin">Center</a></li>
            <li><a href="/IEMS/index.php/Vacation/admin">Vacation</a></li>
            
        </ul>
    </li>
    
     <li>
        <a href="#">Config</a>
        <ul>
            <li><a href="/IEMS/index.php/User/admin">User</a></li>
            <li><a href="/IEMS/index.php/Country/admin">Country</a></li>
            <li><a href="/IEMS/index.php/City/admin">City</a></li>
            <li><a href="/IEMS/index.php/Reference/admin">Student Refrence</a></li>
            <li><a href="/IEMS/index.php/LeaveReason/admin">Leave Reason</a></li>
            <li><a href="/IEMS/index.php/CoordinatorGroup/admin">Coordinator Group</a></li>
            <li><a href="/IEMS/index.php/CourseGroup/admin">Course Group</a></li>
            <li><a href="/IEMS/index.php/CourseType/admin">Course Type</a></li>
            <li><a href="/IEMS/index.php/FamilyRelation/admin">Family Relation</a></li>
            <li><a href="/IEMS/index.php/MedicalStatus/admin">Medical Status</a></li>
            <li><a href="/IEMS/index.php/AgeRange/admin">Age Range</a></li>
            <li><a href="/IEMS/index.php/SessionChangeReason/admin">Session Change Reason</a></li>
            <li><a href="/IEMS/index.php/DocumentType/admin">Document Type</a></li>
			<li><a href="/IEMS/index.php/WithdrawReason/admin">Withdrawl Reason</a></li>
            
        </ul>
    </li>
    
    <li><a href="/IEMS/index.php/site/page?view=about">Reports</a></li>
	
	<li><a href="/IEMS/index.php/site/login">Login</a></li>
	
	
</ul>

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
    