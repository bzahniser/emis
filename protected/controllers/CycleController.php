<?php

class CycleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','fillCourse','fillLevel','fillCity','fillCenter','PrintAttendance'),
				'roles'=>array('CycleCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','endcycle','Activate','InActivate','PrintAttendance'),
				'roles'=>array('CycleUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'roles'=>array('CycleRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('CycleDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view','detailView'),
				'roles'=>array('CycleView'),
			),
                        
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionPrintAttendance($id)
	{
            $model=$this->loadModel($id);
            $productPdf = CertificatePdf::doc();
            //$productPdf->Set(20,20);
            $productPdf->setData(array('model'=>$model));
            $productPdf->output(); //destination param = 'I' = standard output to the browser
            //other destination params: 'F'=file, 'D'=download, 'S'=string ... see TCPDF docs  
            //$productPdf->output('D'); //enforce download
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
        
         public function actionTimeTable($id)
	{
            //$eventArray=array();
            $eventArray = Yii::app()->db->createCommand()
                                                    ->select('*')
                                                    ->from('v_Session_time_table')
                                                    ->where('CycleID=:id1', array(':id1'=>$id))
                                                    ->queryAll();
            //$model=  $this->loadModel($id);
            $this->render('TimeTable',array('eventArray'=>$eventArray));
	}

        public function actionendcycle($id) {
            $model=$this->loadModel($id);
		if(isset($_POST['Cycle']))
		{
                    $model->attributes=$_POST['Cycle'];
                    $model->CycleEnd=1;
                    $model->CycleEndTS=date("Y-m-d h:i:sa");
                    $model->CycleEndBy=Yii::app ()->user->userid;
                    $model->Active=0;
                    
			if($model->save())
				$this->redirect(array('admin'));
		}
            if(!$model->CycleEnd)
		$this->render('end',array('model'=>$model,));
        }
        
        public function actionfillCourse() {
            $Parent = $_POST['Cycle']['ProgramID'];
            $data=  Course::model()->findAll('Active =1 and ProgramID=:cat_id',
                    array(':cat_id'=> $Parent));

             $data=CHtml::listData($data,'CourseID','CourseName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
        public function actionfillLevel() {
            $Parent = $_POST['Cycle']['CourseID'];
            $data=  Level::model()->findAll('Active =1 and CourseID=:cat_id',
                    array(':cat_id'=> $Parent));

             $data=CHtml::listData($data,'LevelID','LevelName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
        public function actionfillCity() {
            $Parent = $_POST['Cycle']['CountryID'];
            $data=  City::model()->findAll('Active =1 and CountryID=:cat_id',
                    array(':cat_id'=> $Parent));

             $data=CHtml::listData($data,'CityID','CityName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
        public function actionfillCenter() {
            $Parent = $_POST['Cycle']['CityID'];
            $data=  Center::model()->findAll('Active =1 and CityID=:cat_id',
                    array(':cat_id'=> $Parent));

             $data=CHtml::listData($data,'CenterID','CenterName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
         public function actiondetailView($id)
	{
             $model=$this->loadModel($id);
		$this->render('detailView',array(
			'model'=>$model,
		));
                
	}
        
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cycle;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cycle']))
		{
			$model->attributes=$_POST['Cycle'];
                        
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->CycleEnd=0;
                        
                        $trans = Yii::app()->db->beginTransaction();
                        
                        try 
                        {
                            
                            if($model->save())
                            {
                                $result=LevelSubject::model()->findAll("Active=1 and LevelID='$model->LevelID'");
                                foreach($result as $value)
                                {
                                    $cyclesSubject=new CycleSubject;
                                    $cyclesSubject->ProgramID=$model->ProgramID;
                                    $cyclesSubject->CourseID=$model->CourseID;
                                    $cyclesSubject->LevelID=$model->LevelID;
                                    $cyclesSubject->CycleID=$model->CycleID;
                                    $cyclesSubject->SubjectID=$value->SubjectID;
                                    $cyclesSubject->LevelSubjectID=$value->ID;
                                    $cyclesSubject->FacilitatorID=$model->FacilitatorID;
                                    $cyclesSubject->Active=1;
                                    $cyclesSubject->Created=date("Y-m-d h:i:sa");
                                    $cyclesSubject->CreatedBy=Yii::app ()->user->userid;
                                    $cyclesSubject->Updated=date("Y-m-d h:i:sa");
                                    $cyclesSubject->UpdatedBy=Yii::app ()->user->userid;
                                    $cyclesSubject->AttendancePerSubject=$model->AttendancePerSubject;
                                    if(!$cyclesSubject->save())
                                    {
                                        $model->addErrors('Please Check Cycle Subject');
                                    }
                                }
                                
                                $result1=LevelExam::model()->findAll("Active=1 and LevelID='$model->LevelID'");
                                foreach($result1 as $value1)
                                {
                                    $cycleExam=new CycleExam;
                                    $cycleExam->ProgramID=$model->ProgramID;
                                    $cycleExam->CourseID=$model->CourseID;
                                    $cycleExam->LevelID=$model->LevelID;
                                    $cycleExam->CycleID=$model->CycleID;
                                    $cycleExam->SubjectID=$value1->SubjectID;
                                    $cycleExam->LevelExamID=$value1->ID;
                                    $cycleExam->ExamID=$value1->ExamID;
                                    
                                    $cycleExam->Pre=$value1->Pre;
                                    $cycleExam->Post=$value1->Post;
                                    $cycleExam->Mid=$value1->Mid;
                                    $cycleExam->Score=$value1->Score;
                                    $cycleExam->PassingScore=$value1->PassingPercentage;
                                    $cycleExam->PassingRequired=$value1->PassingRequired;
                                    
                                    $cycleExam->Active=1;
                                    $cycleExam->Created=date("Y-m-d h:i:sa");
                                    $cycleExam->CreatedBy=Yii::app ()->user->userid;
                                    $cycleExam->Updated=date("Y-m-d h:i:sa");
                                    $cycleExam->UpdatedBy=Yii::app ()->user->userid;

                                    $cycleExam->save();
                                }

                                $trans->commit();
                                $this->redirect(array('view','id'=>$model->CycleID));
                            }
                        } 
                        catch (Exception $ex) 
                        {
                            $trans->rollback();
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cycle']))
		{
			$model->attributes=$_POST['Cycle'];
                       
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->CycleID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cycle');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cycle('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cycle']))
			$model->attributes=$_GET['Cycle'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cycle the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cycle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cycle $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cycle-form')
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
        if(file_exists($rows['BasePath'].'protected\runtime\pdf\attendancepdf.pdf'))
        {
            unlink ('C:\xampp\htdocs\IEMS\protected\runtime\pdf\attendancepdf.pdf');
        }
        return 'attendancepdf.pdf';
        //if(file_exists('tes2.pdf'))
    }
 
    // the info assigned to the pdf document
    protected function initDocInfo()
    {
        $pdf = $this->getPdf();
 
        $pdf->SetTitle('IRC Attendance Form');
        $pdf->SetSubject('IRC Education Attendance Form');
        $pdf->SetAuthor('IRC Education Management System');
        $pdf->SetKeywords('x, y, z');
    }
 
 
    public function renderPdf()
    {
             
        $pdf = $this->getPdf();
        $model = $this->getDataItem('model');
        $t=getDate(strtotime($model->StartDate));
        $Date=date_create_from_format('Y-m-d', $model->StartDate);
        $Date->modify('-'.($t['wday']-1).' day');
        
        $weeks=date_diff(date_create_from_format('Y-m-d', $model->EndDate), date_create_from_format('Y-m-d', $model->StartDate));
        $weeks=round($weeks->days/7, 0, PHP_ROUND_HALF_UP);
        
        $rows= Yii::app()->db->createCommand()
            ->select('en.StudentID,FullName')
            ->from('tbl_cycle_enrolment en')
            ->join('tbl_Student st','en.StudentID=st.StudentID')
            ->where('en.CycleID='.$model->CycleID)
            ->order('FullName')
            ->queryAll();
        
        for ($i=0;$i<$weeks;$i++)
        {
            $this->addPage();
            $pdf->SetXY(10, 10);
            $pdf->Write(0, 'Course: ' . $model->course->CourseName);
            $pdf->SetXY(50, 10);
            $pdf->Write(0, 'Level: ' . $model->level->LevelName);
            $pdf->SetXY(100, 10);
            $pdf->Write(0, 'Cycle: ' . $model->CycleName);
            $pdf->SetXY(160, 10);
            $pdf->Write(0, 'Start: ' . $model->StartDate);
            //$pdf->SetXY(200, 10);
            //$pdf->Write(0, 'End: ' . $model->EndDate);
            $pdf->SetXY(240, 10);
            $pdf->Write(0, 'Week: ' . ($i+1));
            
            $Dats=array();
            
            for ($cn=0;$cn<5;$cn++)
            {
                $Dats[]=$Date->format('d-m');
                $Date->modify('+1 day');
            }
            $Date->modify('+2 day');
            
            $tbl_header = '<table style="width: 638px;" cellspacing="0">';
            $tbl_footer = '</table>';
            $tbl = 
                '<tr>
                    <td style="border: 1px solid #000000; width: 30px;">Row</td>
                    <td style="border: 1px solid #000000; width: 30px;">ID</td>
                    <td style="border: 1px solid #000000; width: 200px;">Student</td>
                    <td style="border: 1px solid #000000; width: 80px;">Mon '.$Dats[0].'</td>
                    <td style="border: 1px solid #000000; width: 80px;">Tue '.$Dats[1].'</td>
                    <td style="border: 1px solid #000000; width: 80px;">Wed '.$Dats[2].'</td>
                    <td style="border: 1px solid #000000; width: 80px;">Thu '.$Dats[3].'</td>
                    <td style="border: 1px solid #000000; width: 80px;">Fri '.$Dats[4].'</td>
                </tr>';
            
            $o=0;
            foreach ($rows as $value) {
                $o++;
                $tbl .= '
                    <tr>
                        <td style="border: 1px solid #000000; width: 30px;">'.$o.'</td>
                        <td style="border: 1px solid #000000; width: 30px;">'.$value['StudentID'].'</td>
                        <td style="border: 1px solid #000000; width: 200px;">'.$value['FullName'].'</td>
                        <td style="border: 1px solid #000000; width: 80px;"></td>
                        <td style="border: 1px solid #000000; width: 80px;"></td>
                        <td style="border: 1px solid #000000; width: 80px;"></td>
                        <td style="border: 1px solid #000000; width: 80px;"></td>
                        <td style="border: 1px solid #000000; width: 80px;"></td>
                    </tr>
                ';
                }
            $pdf->SetXY(30, 20);
            $pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
        }
    }
}