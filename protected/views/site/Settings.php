<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Settings';
$this->breadcrumbs=array(
	'Settings',
);
?>
<h1>Settings</h1>
        <?php 
            
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/User/admin'>User </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Usermenu/admin'>User Menu</b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/user/changepassword'>Change User Passowrd</b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Country/admin'>Country </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/City/admin'>City </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/LeaveReason/admin'>Leave Reason </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/FacilitatorGroup/admin'>Facilitator Group </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/CoordinatorGroup/admin'>Coordinator Group </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/CourseGroup/admin'>Course Group </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/CourseType/admin'>Course Type </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/FamilyRelation/admin'>Family Relation </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/MedicalStatus/admin'>Medical Status </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/AgeRange/admin'>Age Range </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/SessionChangeReason/admin'>Session Change Reason </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/DocumentType/admin'>Document Type </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/withdrawReason/admin'>Dropping Reason </b>";
                    
        ?>