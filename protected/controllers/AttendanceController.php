<?php

class AttendanceController extends Controller
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
				'actions'=>array('create','fillCourse','fillLevel','fillCycle','FindPostCode',
                                    'editable','AttendanceSessionSelect','fillSubject','fillDate','AttendanceGeneration','InsertSuc'),
				'roles'=>array('AttendanceCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','Activate','InActivate','editable'),
				'roles'=>array('AttendanceUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin','DailyStudentList'),
				'roles'=>array('AttendanceRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('AttendanceDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('AttendanceView'),
			),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('DailyStudentList'),
				'roles'=>array('CenterEntry'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionAttendanceGeneration($id)
	{
                //$modelSession=new CycleSession;
                $modelSession=$this->loadModelSession($id);
                
                if(isset($_POST['yt0']) and $_POST['yt0']=='Submit')
		{
                    if($modelSession->cycle->AttendancePerSubject==="0" or isset($modelSession->SubjectID))
                    {
                        $trans = Yii::app()->db->beginTransaction();
                        try
                        {
                            $Presnts=0;
                            $Absents=0;
                            if (isset($_POST['ID']))
                                $CheckedList=$_POST['ID'];
                            else 
                                $CheckedList=[];
                            $df = Yii::app()->db->createCommand()
                                                            //->select('DefaultValue')
                                                            ->from('V_AttendanceGeneration')
                                                            ->where('SessionID=:id1', array(':id1'=>$id))
                                                            ->queryAll();
                            foreach ($df as $value) {
                                //get flag is Checked
                                $ischecked=0;
                                $count=  count($CheckedList);
                                for ($i=0; $i<$count; $i++) 
                                {
                                    if($CheckedList[$i]===$value['ID'])
                                    {
                                        $ischecked=1;
                                        array_splice($CheckedList,$i,1);
                                        break;
                                    }
                                }

                                if(!isset($value['AttendanceID']))
                                {//insert
                                    $modelAttendance=new Attendance;
                                    $modelAttendance->ProgramID=$value['ProgramID'];
                                    $modelAttendance->StudentID=$value['StudentID'];
                                    $modelAttendance->FacilitatorID=$value['FacilitatorID'];
                                    $modelAttendance->CycleID=$value['CycleID'];
                                    $modelAttendance->CourseID=$value['CourseID'];
                                    $modelAttendance->LevelID=$value['LevelID'];
                                    $modelAttendance->SessionID=$value['SessionID'];
                                    $modelAttendance->AttendanceDate=$value['SessionDate'];
                                    $modelAttendance->EnrolmentID=$value['EnrolmentID'];
                                    $modelAttendance->Active=1;
                                    $modelAttendance->Created=date("Y-m-d h:i:sa");
                                    $modelAttendance->CreatedBy=Yii::app ()->user->userid;;
                                    $modelAttendance->Updated=date("Y-m-d h:i:sa");
                                    $modelAttendance->UpdatedBy=Yii::app ()->user->userid;;
                                    if ($ischecked==1)
                                    {//Present
                                        $modelAttendance->Present=1;
                                        $modelAttendance->Absent=0;
                                        $modelAttendance->save();
                                        $Presnts++;
                                    }
                                    else
                                    {//Absent
                                        $modelAttendance->Present=0;
                                        $modelAttendance->Absent=1;
                                        $modelAttendance->save();
                                        $Absents++;
                                    }
                                }
                                else 
                                {//update
                                    $model=$this->loadModel($value['AttendanceID']);
                                    if ($ischecked==1)
                                    {//Present
                                        $model->Present=1;
                                        $model->Absent=0;
                                        $model->save();
                                        $Presnts++;
                                    }
                                    else
                                    {//Absent
                                        $model->Present=0;
                                        $model->Absent=1;
                                        $model->save();
                                        $Absents++;
                                    }
                                }
                            }
                            $trans->commit();
                            $this->redirect(array('InsertSuc','Absents'=>$Absents,'Presnts'=>$Presnts));
                        }
                        catch (Exception $ex) 
                        {
                            $trans->rollback();
                        }   
                    }
                }
		$this->render('AttendanceGeneration',array(
			'modelSession'=>$modelSession,));
	}
        
        public function actionInsertSuc($Absents,$Presnts)
	{
		$this->render('InsertSuc',array('Absents'=>$Absents,'Presnts'=>$Presnts));
	}
        
        public function actionDailyStudentList()
	{
		$this->render('DailyStudentList',array());
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
        
        public function actioneditable() {
            //$r = Yii::app()->getRequest();
            $PK=$_POST['pk'];
            $Val=$_POST['value'];
            $model=$this->loadModel($PK);
            if ($Val==0)
            {
                $model->Present=0;
                $model->Absent=1;
            }
            else
            {
                $model->Present=1;
                $model->Absent=0;
            }
            if ($model->session->Active==1 and $model->Active==1)
            {
                $model->save();
            }
            else 
            {
                    er;
            }
        }
        
        public function actionfillDate() {
            $Parent = $_POST['CycleSession']['CycleID'];
            $data= CycleSession::model()->findAll('Active =1 and CycleID=:cat_id',
                    array(':cat_id'=> $Parent));

             $data=CHtml::listData($data,'SessionDate','SessionDate');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
        public function actionfillSubject() {
            $Parent = $_POST['CycleSession']['SessionDate'];
            $Parent2 = $_POST['CycleSession']['CycleID'];
            $c = new CDbCriteria;
            $c->select = ['t.SubjectID, t.SubjectName'];
            $c->join = "INNER JOIN tbl_cycle_session b ON t.SubjectID = b.SubjectID and b.Active=1 "
                    . "inner join tbl_cycle c on b.CycleID=c.CycleID"
                    . " WHERE c.AttendancePerSubject=1"
                    . " AND b.CycleID in (SELECT DISTINCT CycleID from tbl_cycle_subject where AttendancePerSubject=1 and CycleID=".$Parent2.")"
                    . " AND b.SessionDate='".$Parent."'"
                    . " AND b.CycleID=".$Parent2;
            $data=Subject::model()->findAll($c);
            //$list=Subject::model()->findAll("LevelID='$parent'");
            $data = CHtml::listData($data,'SubjectID','SubjectName');
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
        public function actionfillCourse() {
            $Parent = $_POST['Attendance']['ProgramID'];
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
            $Parent = $_POST['Attendance']['CourseID'];
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
       
        public function actionfillCycle() {
            $Parent = $_POST['Attendance']['LevelID'];
            $StudentID=$_POST['Attendance']['StudentID'];
            $data=  Cycle::model()->findAll(
                            ' Active =1 and CycleEnd=0 and '
                          . ' LevelID=:cat_id and '
                          . ' CycleID in (SELECT CycleID FROM tbl_Cycle_Enrolment where StudentID=:StID) ',
                    array(':cat_id'=> $Parent,':StID'=>$StudentID));

             $data=CHtml::listData($data,'CycleID','CycleName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

        public function actionAttendanceSessionSelect()
	{
                $modelSession=new CycleSession;
                if(isset($_POST['CycleSession']))
		{
                    $modelSession->attributes=$_POST['CycleSession'];
                    if($modelSession->CycleID !="-- Select --" and $modelSession->SessionDate !="-- Select --" and $modelSession->CycleID !="" and $modelSession->SessionDate !="")
                    {
                        if($modelSession->cycle->AttendancePerSubject==='1')
                        {
                            if ($modelSession->SubjectID ==="-- Select --" or $modelSession->SubjectID ==="")
                               $df=0;
                            else
                               $df = Yii::app()->db->createCommand()
                                                ->select('SessionID')
                                                ->from('tbl_cycle_session')
                                                ->where("CycleID=".$modelSession->CycleID
                                                        . " and SessionDate='".$modelSession->SessionDate ."'"
                                                        . " and SubjectID=".$modelSession->SubjectID
                                                        )
                                                ->queryRow();
                        }
                        else 
                            $df = Yii::app()->db->createCommand()
                                                    ->select('SessionID')
                                                    ->from('tbl_cycle_session')
                                                    ->where('CycleID='.$modelSession->CycleID
                                                            . " and SessionDate='".$modelSession->SessionDate ."'"
                                                            )
                                                    ->queryRow();
                        if ((int)$df!=0)
                        {
                            $id=$df['SessionID'];
                            $this->redirect(array('AttendanceGeneration','id'=>$id));
                        }
                    }
                }
		$this->render('AttendanceSessionSelect',array('modelSession'=>$modelSession
		));
	}
        
	public function actionCreate()
	{
                $SessionID=$_GET['id'];
		$model=new Attendance;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attendance']))
		{
                    
                    $model->attributes=$_POST['Attendance'];
                    $modelSession=$this->loadModelSession($SessionID);
                    $modelCycle=$this->loadModelCycle($modelSession->CycleID);
                    $df = Yii::app()->db->createCommand()
                                            ->select('EnrolmentID')
                                            ->from('tbl_cycle_enrolment')
                                            ->where('StudentID=:id1 and CycleID=:id2', array(':id1'=>$model->StudentID, ':id2'=>$modelSession->CycleID))
                                            ->queryRow();
                    if ((int)$df>0 and $modelCycle->CycleEnd===0)
                    {
                        $model->ProgramID=$modelSession->ProgramID;
                        $model->CourseID=$modelSession->CourseID;
                        $model->LevelID=$modelSession->LevelID;
                        $model->CycleID=$modelSession->CycleID;
                        $model->SessionID=$modelSession->SessionID;
                        $model->FacilitatorID=$modelSession->FacilitatorID;
                        $model->AttendanceDate=$modelSession->SessionDate;
                        $model->EnrolmentID=(int)$df;
                        $model->Active= 1;
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        if($model->Present===1)
                            $model->Absent=0;
                        else
                            $model->Absent=0;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->AttendanceID));
                    }
                    else
                    {//Student Not Registered
                        er;
                    }
		}
                $modelSession=$this->loadModelSession($SessionID);
                $modelCycle=$this->loadModelCycle($modelSession->CycleID);
                
                if ($modelCycle->CycleEnd==0)
                    $this->render('create',array(
                            'model'=>$model,'SessionID'=>$SessionID,'modelSession'=>$modelSession,'modelCycle'=>$modelCycle
                    ));
                else
                    er;
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
        
        public function loadModelSession($id)
	{
		$modelSession=  CycleSession::model()->findByPk($id);
		if($modelSession===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelSession;
	}
        
        public function loadModelCycle($id)
	{
		$modelCycle=  Cycle::model()->findByPk($id);
		if($modelCycle===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelCycle;
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

		if(isset($_POST['Attendance']))
		{
			$model->attributes=$_POST['Attendance'];
                      
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->AttendanceID));
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
		$dataProvider=new CActiveDataProvider('Attendance');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Attendance('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attendance']))
			$model->attributes=$_GET['Attendance'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Attendance the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Attendance::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Attendance $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attendance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
