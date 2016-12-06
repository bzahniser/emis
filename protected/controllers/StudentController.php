<?php

class StudentController extends Controller
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
                        //array('application.extensions.booster.filters.BoosterFilter - delete'),
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','fillCurrentCity','fillOriginalCity','CopyFromBrotherSelect','CopyFromBrother','findPostCode'),
				'roles'=>array('StudentCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','Activate','InActivate','ff2'),
				'roles'=>array('StudentUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'roles'=>array('StudentRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('StudentDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view','detailView','TimeTable'),
				'roles'=>array('StudentView'),
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
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionActivate($id)
	{
		$model=$this->loadModel($id);
		$model->Active=1;
		$model->save();
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
        public function actionfillOriginalCity() 
        {
            $Parent = $_POST['Student']['OriginalCountryID'];
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
        
        public function actionfillCurrentCity() 
        {
            $Parent = $_POST['Student']['CurrentCountryID'];
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

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        
        public function actiondetailView($id)
	{
		$model=$this->loadModel($id);
		$this->render('detailView',array(
			'model'=>$model,
		));
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
        
        public function actionTimeTable($id)
	{
            //$eventArray=array();
            $eventArray = Yii::app()->db->createCommand()
                                                    ->select('*')
                                                    ->from('V_Student_Attendance')
                                                    ->where('StudentID=:id1', array(':id1'=>$id))
                                                    ->queryAll();
            //$model=  $this->loadModel($id);
            $this->render('TimeTable',array('eventArray'=>$eventArray));
	}
        
	public function actionCreate()
	{
		$model=new Student;
                $modelF=new Document;
                $modelEnrolment=new CycleEnrolment;
                $modelCycle=new Cycle;
                $modelLevel=new Level;
                $errors=array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
                        $modelF->attributes=$_POST['Document'];
                        if(isset($_POST['CycleID']))
                            $cycls=$_POST['CycleID'];
                        else
                            $cycls=[];
                        
                        if(isset($_POST['LevelID']))
                            $waitinglevels=$_POST['LevelID'];  
                        else
                            $waitinglevels=[];   
                        
                        $model->FullName=$model->Name.' '.$model->LastName;
                        $model->ArabicFullName=$model->ArabicName.' '.$model->ArabicLastName;
                        
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->Active=1;
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2 and ProgramID=:id3', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'RgistrationCountryID', ':id3'=>$model->ProgramID))
                                                    ->queryRow();
                        $model->RegistrationCityID=(int)$df['DefaultValue'];
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2 and ProgramID=:id3', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'RgistrationCityID', ':id3'=>$model->ProgramID))
                                                    ->queryRow();
                        $model->RgistrationCountryID=(int)$df['DefaultValue'];
                        $model->RegistrationEmpID=Yii::app ()->user->userid;
                        $modelF->ProgramID= $model->ProgramID;
                        $modelF->RelationID=$model->FamilyRelationID;
                        $modelF->Active=1;
                        $modelF->Created= date("Y-m-d h:i:sa");
                        $modelF->CreatedBy= Yii::app ()->user->userid;
                        $modelF->Updated= date("Y-m-d h:i:sa");
                        $modelF->UpdatedBy= Yii::app ()->user->userid;
                        
                        $trans = Yii::app()->db->beginTransaction();
                        
                        try 
                        {
                            if($modelF->validate())
                            {
                                    $modelF->save();
                                    $model->RelationDID= $modelF->DID;
                                    if ($model->validate())
                                    {
                                            $model->save();
                                            foreach ($cycls as $selectedcycle)
                                            {
                                                $modelCycle=$this->loadModelCycle($selectedcycle);
                                                $CycleEnrolment=new CycleEnrolment;
                                                
                                                $year=strtok(date("Y-m-d h:i:sa"), '-');
                                                $StudentYear=strtok($model->BirthDate, '-');
                                                $StudentAge=$year-$StudentYear;

                                                $Frm=$modelCycle->age->RangeFrom-$modelCycle->AgeFlexability;
                                                $To=$modelCycle->age->RangeTo+$modelCycle->AgeFlexability;

                                                if($StudentAge>=$Frm and $StudentAge<=$To)
                                                {
                                                    $CycleEnrolment->ProgramID=$modelCycle->ProgramID;
                                                    $CycleEnrolment->StudentID=$model->StudentID;
                                                    $CycleEnrolment->CourseID=$modelCycle->CourseID;
                                                    $CycleEnrolment->LevelID=$modelCycle->LevelID;
                                                    $CycleEnrolment->CycleID=$modelCycle->CycleID;
                                                    $CycleEnrolment->Withdrawl=0;
                                                    $CycleEnrolment->Transportation=$modelCycle->Transportation;
                                                    $CycleEnrolment->Active=1;
                                                    $CycleEnrolment->Created= date("Y-m-d h:i:sa");
                                                    $CycleEnrolment->CreatedBy= Yii::app ()->user->userid;
                                                    $CycleEnrolment->Updated= date("Y-m-d h:i:sa");
                                                    $CycleEnrolment->UpdatedBy= Yii::app ()->user->userid;

                                                    if(!$CycleEnrolment->save())
                                                    {
                                                        $errors[] = "Cant be Enrolled to ".$modelCycle->CycleName;
                                                        throw new CHttpException("Cant be Enrolled to ".$modelCycle->CycleName);
                                                    }
                                                }
                                                else 
                                                {
                                                    $errors[] = "Cant be Enrolled to ".$modelCycle->CycleName;
                                                    throw new CHttpException("Cant be Enrolled to ".$modelCycle->CycleName);
                                                }
                                            }
                                            
                                            foreach ($waitinglevels as $selectedlevel)
                                            {
                                                $modelLevel=$this->loadModelLevel($selectedlevel);
                                                $Waiting=new Waiting;
                                                $Waiting->ProgramID=$modelLevel->ProgramID;
                                                $Waiting->StudentID=$model->StudentID;
                                                $Waiting->CourseID=$modelLevel->CourseID;
                                                $Waiting->LevelID=$modelLevel->LevelID;
                                                $Waiting->Enrolled=0;
                                                
                                                $Waiting->Active=1;
                                                $Waiting->Created= date("Y-m-d h:i:sa");
                                                $Waiting->CreatedBy= Yii::app ()->user->userid;
                                                $Waiting->Updated= date("Y-m-d h:i:sa");
                                                $Waiting->UpdatedBy= Yii::app ()->user->userid;
                                                
                                                if(!$Waiting->save())
                                                {
                                                    $errors[] = "Cant be added to ".$modelCycle->CycleName." Waiting List";
                                                    throw new CHttpException("Cant be added to ".$modelCycle->CycleName." Waiting List");
                                                }
                                            }
                                            
                                            $trans->commit();
                                            $this->redirect(array('Student/detailView','id'=>$model->StudentID));
                                    }
                                    else
                                    {
                                        $errors[] = 'Please fill all required Data';
                                        throw new CHttpException("Please fill all required Data");
                                    }
                            }
                            else 
                            {
                                $errors[] = 'Parent data is missing or Parent Already defineds';
                                throw new CHttpException("Parent data is missing or Parent Already defineds");
                            }
                        } 
                        catch (Exception $ex) 
                        {
                            $trans->rollback();
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'modelF'=>$modelF,
                        'modelCycle'=>$modelCycle,
                        'modelLevel'=>$modelLevel,
                        'errors'=>$errors,
		));
	}
        
        
        public function actionff2()
	{
		$model=new Student;
                $modelF=new Document;
                $modelEnrolment=new CycleEnrolment;
                $modelCycle=new Cycle;
                $modelLevel=new Level;
                $errors=array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
                        $modelF->attributes=$_POST['Document'];
                        if(isset($_POST['CycleID']))
                            $cycls=$_POST['CycleID'];
                        else
                            $cycls=[];
                        
                        if(isset($_POST['LevelID']))
                            $waitinglevels=$_POST['LevelID'];  
                        else
                            $waitinglevels=[];   
                        
                        $model->FullName=$model->Name.' '.$model->LastName;
                        $model->ArabicFullName=$model->ArabicName.' '.$model->ArabicLastName;
                        
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->Active=1;
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2 and ProgramID=:id3', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'RgistrationCountryID', ':id3'=>$model->ProgramID))
                                                    ->queryRow();
                        $model->RegistrationCityID=(int)$df['DefaultValue'];
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2 and ProgramID=:id3', array(':id1'=>Yii::app ()->user->userid, ':id2'=>'RgistrationCityID', ':id3'=>$model->ProgramID))
                                                    ->queryRow();
                        $model->RgistrationCountryID=(int)$df['DefaultValue'];
                        $model->RegistrationEmpID=Yii::app ()->user->userid;
                        $modelF->ProgramID= $model->ProgramID;
                        $modelF->RelationID=$model->FamilyRelationID;
                        $modelF->Active=1;
                        $modelF->Created= date("Y-m-d h:i:sa");
                        $modelF->CreatedBy= Yii::app ()->user->userid;
                        $modelF->Updated= date("Y-m-d h:i:sa");
                        $modelF->UpdatedBy= Yii::app ()->user->userid;
                        
                        $trans = Yii::app()->db->beginTransaction();
                        
                        try 
                        {
                            if($modelF->validate())
                            {
                                    $modelF->save();
                                    $model->RelationDID= $modelF->DID;
                                    if ($model->validate())
                                    {
                                            $model->save();
                                            foreach ($cycls as $selectedcycle)
                                            {
                                                $modelCycle=$this->loadModelCycle($selectedcycle);
                                                $CycleEnrolment=new CycleEnrolment;
                                                
                                                $year=strtok(date("Y-m-d h:i:sa"), '-');
                                                $StudentYear=strtok($model->BirthDate, '-');
                                                $StudentAge=$year-$StudentYear;

                                                $Frm=$modelCycle->age->RangeFrom-$modelCycle->AgeFlexability;
                                                $To=$modelCycle->age->RangeTo+$modelCycle->AgeFlexability;

                                                if($StudentAge>=$Frm and $StudentAge<=$To)
                                                {
                                                    $CycleEnrolment->ProgramID=$modelCycle->ProgramID;
                                                    $CycleEnrolment->StudentID=$model->StudentID;
                                                    $CycleEnrolment->CourseID=$modelCycle->CourseID;
                                                    $CycleEnrolment->LevelID=$modelCycle->LevelID;
                                                    $CycleEnrolment->CycleID=$modelCycle->CycleID;
                                                    $CycleEnrolment->Withdrawl=0;
                                                    $CycleEnrolment->Transportation=$modelCycle->Transportation;
                                                    $CycleEnrolment->Active=1;
                                                    $CycleEnrolment->Created= date("Y-m-d h:i:sa");
                                                    $CycleEnrolment->CreatedBy= Yii::app ()->user->userid;
                                                    $CycleEnrolment->Updated= date("Y-m-d h:i:sa");
                                                    $CycleEnrolment->UpdatedBy= Yii::app ()->user->userid;

                                                    if(!$CycleEnrolment->save())
                                                    {
                                                        $errors[] = "Cant be Enrolled to ".$modelCycle->CycleName;
                                                        throw new CHttpException("Cant be Enrolled to ".$modelCycle->CycleName);
                                                    }
                                                }
                                                else 
                                                {
                                                    $errors[] = "Cant be Enrolled to ".$modelCycle->CycleName;
                                                    throw new CHttpException("Cant be Enrolled to ".$modelCycle->CycleName);
                                                }
                                            }
                                            
                                            foreach ($waitinglevels as $selectedlevel)
                                            {
                                                $modelLevel=$this->loadModelLevel($selectedlevel);
                                                $Waiting=new Waiting;
                                                $Waiting->ProgramID=$modelLevel->ProgramID;
                                                $Waiting->StudentID=$model->StudentID;
                                                $Waiting->CourseID=$modelLevel->CourseID;
                                                $Waiting->LevelID=$modelLevel->LevelID;
                                                $Waiting->Enrolled=0;
                                                
                                                $Waiting->Active=1;
                                                $Waiting->Created= date("Y-m-d h:i:sa");
                                                $Waiting->CreatedBy= Yii::app ()->user->userid;
                                                $Waiting->Updated= date("Y-m-d h:i:sa");
                                                $Waiting->UpdatedBy= Yii::app ()->user->userid;
                                                
                                                if(!$Waiting->save())
                                                {
                                                    $errors[] = "Cant be added to ".$modelCycle->CycleName." Waiting List";
                                                    throw new CHttpException("Cant be added to ".$modelCycle->CycleName." Waiting List");
                                                }
                                            }
                                            
                                            $trans->commit();
                                            $this->redirect(array('Student/ff2',));
                                    }
                                    else
                                    {
                                        $errors[] = 'Please fill all required Data';
                                        throw new CHttpException("Please fill all required Data");
                                    }
                            }
                            else 
                            {
                                $errors[] = 'Parent data is missing or Parent Already defineds';
                                throw new CHttpException("Parent data is missing or Parent Already defineds");
                            }
                        } 
                        catch (Exception $ex) 
                        {
                            $trans->rollback();
                        }
		}

		$this->render('ff1',array(
			'model'=>$model,
                        'modelF'=>$modelF,
                        'modelCycle'=>$modelCycle,
                        'modelLevel'=>$modelLevel,
                        'errors'=>$errors,
		));
	}
        
        public function actionCopyFromBrotherSelect()
	{
		$model=new StudentRelated;
                if(isset($_POST['StudentRelated']))
		{
                    $model->attributes=$_POST['StudentRelated'];
                    $this->redirect(array('CopyFromBrother','id'=>$model->RelatedID));
                }
                
		$this->render('CopyFromBrotherSelect',array(
			'model'=>$model,
                       
		));
	}
        
        public function actionCopyFromBrother($id)
	{
		$model=new Student;
                $modelF=new Document;
                $modelEnrolment=new CycleEnrolment;
                $modelCycle=new Cycle;
                $modelLevel=new Level;
                $errors=array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
                        $modelF->attributes=$_POST['Document'];
                        if(isset($_POST['CycleID']))
                            $cycls=$_POST['CycleID'];
                        else
                            $cycls=[];
                        
                        if(isset($_POST['LevelID']))
                            $waitinglevels=$_POST['LevelID'];  
                        else
                            $waitinglevels=[];
                        
                        $model->FullName=$model->Name.' '.$model->LastName;
                        $model->ArabicFullName=$model->ArabicName.' '.$model->ArabicLastName;
                        
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->Active=1;
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2 and ProgramID=:id3', array(':id1'=>1, ':id2'=>'RgistrationCountryID', ':id3'=>$model->ProgramID))
                                                    ->queryRow();
                        $model->RegistrationCityID=(int)$df['DefaultValue'];
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2 and ProgramID=:id3', array(':id1'=>1, ':id2'=>'RgistrationCityID', ':id3'=>$model->ProgramID))
                                                    ->queryRow();
                        $model->RgistrationCountryID=(int)$df['DefaultValue'];
                        $model->RegistrationEmpID=Yii::app ()->user->userid;
                        
                        $trans = Yii::app()->db->beginTransaction();
                        
                        try 
                        {
                           
                            //$model->RelationDID= $modelF->DID;
                            if ($model->validate())
                            {
                                    $model->save();
                                    $modelF->save();
                                    $modelRelated=new StudentRelated;
                                    $modelRelated->StudentID=$model->StudentID;
                                    $modelRelated->RelatedID=$id;
                                    $modelRelated->Active=1;
                                    $modelRelated->Created= date("Y-m-d h:i:sa");
                                    $modelRelated->CreatedBy= Yii::app ()->user->userid;
                                    $modelRelated->Updated= date("Y-m-d h:i:sa");
                                    $modelRelated->UpdatedBy= Yii::app ()->user->userid;
                                    $modelRelated->save();
                                    
                                    foreach ($cycls as $selectedcycle)
                                    {
                                        $year=strtok(date("Y-m-d h:i:sa"), '-');
                                        $StudentYear=strtok($model->BirthDate, '-');
                                        $StudentAge=$year-$StudentYear;
                                        $Frm=$modelCycle->age->RangeFrom-$modelCycle->AgeFlexability;
                                        $To=$modelCycle->age->RangeTo+$modelCycle->AgeFlexability;
                                        if($StudentAge>=$Frm and $StudentAge<=$To)
                                        {
                                            $modelCycle=$this->loadModelCycle($selectedcycle);
                                            $CycleEnrolment=new CycleEnrolment;
                                            $CycleEnrolment->ProgramID=$modelCycle->ProgramID;
                                            $CycleEnrolment->StudentID=$model->StudentID;
                                            $CycleEnrolment->CourseID=$modelCycle->CourseID;
                                            $CycleEnrolment->LevelID=$modelCycle->LevelID;
                                            $CycleEnrolment->CycleID=$modelCycle->CycleID;
                                            $CycleEnrolment->Transportation=$modelCycle->Transportation;
                                            $CycleEnrolment->Active=1;
                                            $CycleEnrolment->Created= date("Y-m-d h:i:sa");
                                            $CycleEnrolment->CreatedBy= Yii::app ()->user->userid;
                                            $CycleEnrolment->Updated= date("Y-m-d h:i:sa");
                                            $CycleEnrolment->UpdatedBy= Yii::app ()->user->userid;
                                            if(!$CycleEnrolment->save())
                                            {
                                                $errors[] = "Cant be Enrolled to ".$modelCycle->CycleName;
                                                throw new CHttpException("Cant be Enrolled to ".$modelCycle->CycleName);
                                            }
                                        }
                                        else 
                                        {
                                            $errors[] = "Cant be Enrolled to ".$modelCycle->CycleName;
                                            throw new CHttpException("Cant be Enrolled to ".$modelCycle->CycleName);
                                        }
                                    }

                                    foreach ($waitinglevels as $selectedlevel)
                                    {
                                        $modelLevel=$this->loadModelLevel($selectedlevel);
                                        $Waiting=new Waiting;
                                        $Waiting->ProgramID=$modelLevel->ProgramID;
                                        $Waiting->StudentID=$model->StudentID;
                                        $Waiting->CourseID=$modelLevel->CourseID;
                                        $Waiting->LevelID=$modelLevel->LevelID;
                                        $Waiting->Enrolled=0;
                                        $Waiting->Active=1;
                                        $Waiting->Created= date("Y-m-d h:i:sa");
                                        $Waiting->CreatedBy= Yii::app ()->user->userid;
                                        $Waiting->Updated= date("Y-m-d h:i:sa");
                                        $Waiting->UpdatedBy= Yii::app ()->user->userid;
                                        if(!$Waiting->save())
                                        {
                                            $errors[] = "Cant be added to ".$modelCycle->CycleName." Waiting List";
                                            throw new CHttpException("Cant be added to ".$modelCycle->CycleName." Waiting List");
                                        }
                                    }
                                    $trans->commit();
                                    $this->redirect(array('view','id'=>$model->StudentID));
                            }
                            
                        } 
                        catch (Exception $ex) 
                        {
                            $trans->rollback();
                        }
		}

                $model=  $this->loadModel($id);
                $model->StudentID=NULL;
                $model->Name=NULL;
                $model->ArabicName=NULL;
                $model->BirthDate=NULL;
                $model->DocumentId=NULL;
                $model->PhoneNumber=NULL;
                $model->Whatsup=NULL;
                $model->BenefitFromIRC=NULL;
                $model->BenfitIRCEdu=NULL;
                $model->MediaApproval=NULL;
                $model->RefrenceID=NULL;
                $model->RegisteredinEducation=NULL;
                $model->RegisteredinEducation=NULL;
                $model->OutOfSchool=NULL;
                $model->MedicalStatusID=NULL;
                $model->isNewRecord=true;
                $modelF=$this->loadModelDoc($model->RelationDID);
		$this->render('create',array(
			'model'=>$model,
                        'modelF'=>$modelF,
                        'modelCycle'=>$modelCycle,
                        'modelLevel'=>$modelLevel,
                        'errors'=>$errors,
		));
	}
        
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $modelF=$this->loadModelDoc($model->RelationDID);
		if(isset($_POST['Student']))
		{
                        $model->attributes=$_POST['Student'];
                        $modelF->attributes=$_POST['Document'];
			$model->FullName=$model->Name.' '.$model->LastName;
                        $model->ArabicFullName=$model->ArabicName.' '.$model->ArabicLastName;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $modelF->ProgramID= $model->ProgramID;
                        $modelF->RelationID=$model->FamilyRelationID;
                        $modelF->Active=1;
                        $modelF->Updated= date("Y-m-d h:i:sa");
                        $modelF->UpdatedBy= Yii::app ()->user->userid;
                        $trans = Yii::app()->db->beginTransaction();
                        try 
                        {
                            if ($model->validate())
                                if($modelF->validate())
                                {
                                    $model->save();
                                    $modelF->save();

                                    $trans->commit();
                                    $this->redirect(array('Student/detailView','id'=>$model->StudentID));
                                }
                        } 
                        catch (Exception $ex) 
                        {
                            $trans->rollback();
                        }
		}
		$this->render('update',array(
			'model'=>$model,'modelF'=>$modelF,
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
		$dataProvider=new CActiveDataProvider('Student');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
                //$modelF=Document::model()->findByPk($model->RelationDID);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        public function loadModelDoc($id)
	{
		
                $modelF=Document::model()->findByPk($id);
		if($modelF===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelF;
	}
        
        public function loadModelCycle($id)
	{
		
                $modelCycle=Cycle::model()->findByPk($id);
		if($modelCycle===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelCycle;
	}
        
        public function loadModelLevel($id)
	{
		
                $modelLevel=Level::model()->findByPk($id);
		if($modelLevel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelLevel;
	}
      
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
}
