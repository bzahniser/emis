<?php

class ReportController extends Controller
{
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
        
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 
				'actions'=>array('MonthlyEduReport','test1','Product'),
				'roles'=>array('MonthlyEduReport'),
			),
                        
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public $layout='//layouts/column2';
        
        public function actionGenerateMonthlyEducationData()
	{
		$this->render('GenerateMonthlyEducationData',array());
	}
        
        public function actionMonthlyEduReport()
	{
            $mnth=date("m");
            $yer=date("Y");
            $tp='2';
            if (isset($_POST['yt0']) and $_POST['yt0']=="Refresh")
            {
                $mnth=$_POST['Month'];
                $yer=$_POST['Year'];
                $tp=$_POST['Typ'];
            }
            $this->render('MonthlyEduReport',array('mnth'=>$mnth,'yer'=>$yer,'tp'=>$tp));
	}
        
        public function actiontest1()
	{
            $model = Student::model()->findByPk(4); //load from db

            $productPdf = ProductPdf::doc();
            //$productPdf->Set(20,20);
            $productPdf->setData(array('model'=>$model));
            $productPdf->output(); //destination param = 'I' = standard output to the browser
            //other destination params: 'F'=file, 'D'=download, 'S'=string ... see TCPDF docs  
            //$productPdf->output('D'); //enforce download
            
            //$this->render('test1',array('model'=>$model));
	}
}

