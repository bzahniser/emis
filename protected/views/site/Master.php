<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Master';
$this->breadcrumbs=array(
	'Master',
);
?>
<h1>Master</h1>
        <?php
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Program/admin'>Program </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Subject/admin'>Subject </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Exam/admin'>Exam </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Coordinator/admin'>Coordinator </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Facilitator/admin'>Facilitator </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Center/admin'>Center </b>";
            echo "<div> <a href='".Yii::app()->baseUrl."/index.php/Vacation/admin'>Vacation </b>";
        ?>