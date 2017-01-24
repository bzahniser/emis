<?php

class CycleEnrolmentController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
        
        public function actionFindPostCode() 
        {
            $q = $_GET['term'];
            //$match='m';
            if (isset($q)) {
                $criteria = new CDbCriteria;
                //condition to find your data, using q as the parameter field
                $criteria->condition = 'FullName like :q or ArabicFullName like :q1';
                //$criteria->addSearchCondition('t.Name', ':q1');
                //$criteria->order = '1'; // correct order-by field
                $criteria->limit = 5; // probably a good idea to limit the results
                // with trailing wildcard only; probably a good idea for large volumes of data
                //$match="%m%";
                $criteria->params = array( ':q' =>'%' . trim($q) . '%',':q1' =>'%' . trim($q) . '%'); 
                $PostCodes = Student::model()->findAll($criteria);

                if (!empty($PostCodes)) {
                    $out = array();
                    foreach ($PostCodes as $p) {
                        $out[] = array(
                            // expression to give the string for the autoComplete drop-down
                            'label' => $p->FullName,  
                            'value' => $p->FullName,
                            'id' => $p->StudentID, // return value from autocomplete
                        );
                    }
                    echo CJSON::encode($out);
                    Yii::app()->end();
                }
            }
        }

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','FindPostCode','fillCourse','fillLevel','fillCycle','GenerateCertificate'),
				'roles'=>array('CycleEnrolmentCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','withdraw','Activate','InActivate'),
				'roles'=>array('CycleEnrolmentUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'roles'=>array('CycleEnrolmentRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('CycleEnrolmentDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('CycleEnrolmentView'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionInActivate($id)
	{
		$model=$this->loadModel($id);
		$model->Active=0;
		$model->save();
		$this->redirect(array('admin'));
	}

	public function actionActivate($id)
	{
		$model=$this->loadModel($id);
		$model->Active=1;
		$model->save();
		$this->redirect(array('admin'));
	}
        
        public function actionGenerateCertificate($id)
        {
            $model=$this->loadModel($id);
            $productPdf = CertificatePdf::doc();
            //$productPdf->Set(20,20);
            $productPdf->setData(array('model'=>$model));
            $productPdf->output(); //destination param = 'I' = standard output to the browser
            //other destination params: 'F'=file, 'D'=download, 'S'=string ... see TCPDF docs  
            //$productPdf->output('D'); //enforce download
        }
        
        public function actionwithdraw($id) 
        {
            $model=$this->loadModel($id);
            if (!$model->Withdrawl)
            {
                if(isset($_POST['CycleEnrolment']))
                {
                    $model->attributes=$_POST['CycleEnrolment'];
                    $modelF=$this->loadModel($model->EnrolmentID);
                    $model->StudentID=$modelF->StudentID;
                    $model->CycleID=$modelF->CycleID;
                    $model->Withdrawl=1;
                    $model->WithdrawlUpdate=date("Y-m-d h:i:sa");
                    $model->WithdrawlUpdatedBy=Yii::app ()->user->userid;
                    $model->Active=0;

                    if($model->save())
                        $this->redirect(array('admin'));
                }             
                else
                    $this->render('withdraw',array('model'=>$model,'CName'=>$model->cycle->CycleName,'SName'=>$model->student->FullName));
            }
            else {
                $this->redirect(array('admin'));
            }
        }

        public function actionfillCourse() {
            $ProgramID = $_POST['CycleEnrolment']['ProgramID'];
            $data=  Course::model()->findAll('Active =1 and ProgramID=:cat_id',
                    array(':cat_id'=> $ProgramID));

             $data=CHtml::listData($data,'CourseID','CourseName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$CourseName)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($CourseName),true);
                }

        }
        
         public function actionfillLevel() {
            $CourseID = $_POST['CycleEnrolment']['CourseID'];
            $data=  Level::model()->findAll('Active =1 and CourseID=:cat_id',
                    array(':cat_id'=> $CourseID));

             $data=CHtml::listData($data,'LevelID','LevelName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$LevelName)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($LevelName),true);
                }

        }
        
        public function actionfillCycle() {
            $LevelID = $_POST['CycleEnrolment']['LevelID'];
            $data=  Cycle::model()->findAll('Active =1 and LevelID=:cat_id',
                    array(':cat_id'=> $LevelID));

             $data=CHtml::listData($data,'CycleID','CycleName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$CycleName)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($CycleName),true);
                }
        }
        
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new CycleEnrolment;
                $errors=array();

		if(isset($_POST['CycleEnrolment']))
		{
                    $model->attributes=$_POST['CycleEnrolment'];
                    $year=strtok(date("Y-m-d h:i:sa"), '-');
                    $StudentYear=strtok($model->student->BirthDate, '-');
                    $StudentAge=$year-$StudentYear;
                    
                    $Frm=$model->cycle->age->RangeFrom-$model->cycle->AgeFlexability;
                    $To=$model->cycle->age->RangeTo+$model->cycle->AgeFlexability;

                    $trans = Yii::app()->db->beginTransaction();
                    try
                    {
                        if($StudentAge>=$Frm and $StudentAge<=$To)
                        {
                            $model->Created= date("Y-m-d h:i:sa");
                            $model->CreatedBy= Yii::app ()->user->userid;
                            $model->Updated= date("Y-m-d h:i:sa");
                            $model->UpdatedBy= Yii::app ()->user->userid;
                            $model->Active=1;
                            $model->Withdrawl=0;

                            $df = Yii::app()->db->createCommand()
                                                    ->select('WaitingID')
                                                    ->from('tbl_waiting')
                                                    ->where('StudentID=:id1 and LevelID=:id2', 
                                                            array(':id1'=>$model->StudentID, ':id2'=>$model->LevelID))
                                                    ->queryRow();
                            if(isset($df) and $df!=0)
                            {
                                $waitingID=$df['WaitingID'];
                                $modelF= $this->loadModelWaiting($waitingID);
                                $modelF->Enrolled=1;
                                $modelF->EnrolmentDate=date("Y-m-d h:i:sa");
                                $modelF->CycleStartDate=$model->cycle->StartDate;
                                $modelF->Closed=1;
                                $modelF->CloseDate= date("Y-m-d h:i:sa");
                                $modelF->ClosedBy= Yii::app ()->user->userid;
                                $modelF->InformedOfCycleOpening=1;
                                
                                $model->WaitingID= $waitingID;   
                                if ($model->validate())
                                {
                                    $model->save();
                                    if($modelF->validate())
                                    {
                                        $modelF->EnrolmentID=$model->EnrolmentID;
                                        $modelF->CycleID=$model->CycleID;
                                        $modelF->save();   
                                        $trans->commit();
                                        $this->redirect(array('view','id'=>$model->EnrolmentID));
                                    }
                                }
                            }
                            else if ($model->validate())
                            {
                                    $model->save();
                                    $trans->commit();
                                    $this->redirect(array('view','id'=>$model->EnrolmentID));
                            }
                        }
                        else 
                        {
                            $errors[] = "Due to age restriction studet Can't be Enrolled";
                            throw new CHttpException("Due to age restriction studet Can't be Enrolled");
                        }
                    } 
                    catch (Exception $ex) 
                    {
                        $trans->rollback();
                    }
                }
		$this->render('create',array(
			'model'=>$model,'errors'=>$errors
                ));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CycleEnrolment']))
		{
			$model->attributes=$_POST['CycleEnrolment'];
                        
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->EnrolmentID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CycleEnrolment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new CycleEnrolment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CycleEnrolment']))
			$model->attributes=$_GET['CycleEnrolment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=CycleEnrolment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function loadModelWaiting($id)
	{
		$modelF=Waiting::model()->findByPk($id);
		if($modelF===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelF;
	}
        
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cycle-enrolment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

class CertificatePdf extends EPdfFactoryDoc
{
 
    // the pdf name on creating the (cached) file or downloading.
    //always add the extension '.pdf'
    public function getPdfName()
    {
        $rows=Yii::app()->db->createCommand()
            ->from('tbl_config')
            ->queryRow();
        if(file_exists($rows['BasePath'].'protected\runtime\pdf\attendancecertificate.pdf'))
        {
            unlink ('C:\xampp\htdocs\IEMS\protected\runtime\pdf\attendancecertificate.pdf');
        }
        return 'attendancecertificate.pdf';
        //if(file_exists('tes2.pdf'))
    }
 
    // the info assigned to the pdf document
    protected function initDocInfo()
    {
        $pdf = $this->getPdf();
 
        $pdf->SetTitle('IRC Certificate');
        $pdf->SetSubject('IRC Education Certificate');
        $pdf->SetAuthor('IRC Education Management System');
        $pdf->SetKeywords('x, y, z');
    }
 
 
    public function renderPdf()
    {
        $this->addPage();        
        $pdf = $this->getPdf();
        
        $pdf->SetFontSize(20);
        $model = $this->getDataItem('model'); 
        
        $pdf->Image("C:\xampp\htdocs\EMiS\protected\pdf\t.jpg");
        
        $pdf->SetXY(100, 100);
        $pdf->Write(20, 'Student: ' . $model->student->FullName);
        $pdf->SetXY(50, 50);
        $pdf->Write(20, 'Course: ' . $model->course->CourseName);
        $pdf->SetXY(70, 70);
        $pdf->Write(20, 'Course: ' . $model->cycle->CycleName);
        //all code to render the pdf, but no output()
        
    }
}