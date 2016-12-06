<?php

class CycleSessionController extends Controller
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
				'actions'=>array('create','fillCourse','fillLevel','fillCycle','fillSubject','WeekTemplate'),
				'roles'=>array('CycleSessionCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','Activate','InActivate'),
				'roles'=>array('CycleSessionUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'roles'=>array('CycleSessionRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('CycleSessionDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('CycleSessionView'),
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
        
        public function actionWeekTemplate($id)
	{
            $modelWeek= new WeekTemplateModel();
            
            if(isset($_POST['WeekTemplateModel']))
		{
			//$modelWeek->attributes=$_POST['WeekTemplateModel'];
                        $data=$_POST['WeekTemplateModel'];
                        $data['IsSat']=0;
                        $data['IsSun']=0;
                        $error=0;
                        $CycleID=$_GET['id'];
                        $modelCycle=  $this->loadModelCycle($CycleID);
                        $Date= date_create_from_format('Y-m-d', $modelCycle->StartDate);
                        $EndDate= date_create_from_format('Y-m-d', $modelCycle->EndDate);
                        $counter=0;
                        
                        while ($Date <= $EndDate) {
                            
                            $DateName= $Date->format('D');
                            $DateID='Is'.$DateName;
                            $FromID=$DateName.'From';
                            $ToID=$DateName.'To';
                            $FaciID=$DateName.'Faci';
                            $SubID=$DateName.'Sub';               
                            if($data[$DateID])
                            {
                                if((int)str_replace(":","",$data[$FromID])<(int)str_replace(":","",$data[$ToID]))
                                {
                                    $modelCycleSession=new CycleSession();
                                    $modelCycleSession->ProgramID=$modelCycle->ProgramID;
                                    $modelCycleSession->CourseID=$modelCycle->CourseID;
                                    $modelCycleSession->LevelID=$modelCycle->LevelID;
                                    $modelCycleSession->CycleID=$modelCycle->CycleID;
                                    $modelCycleSession->SubjectID=$data[$SubID];
                                    $modelCycleSession->SessionDate=$Date->format('Y-m-d');
                                    $modelCycleSession->TimeFrom=$data[$FromID];
                                    $modelCycleSession->TimeTo=$data[$ToID];
                                    if(!empty($data[$FaciID]))
                                    {
                                        $modelCycleSession->FacilitatorID=$data[$FaciID];
                                    }
                                    else
                                    {
                                        $modelCycleSession->FacilitatorID=$modelCycle->FacilitatorID;
                                    }
                                    $modelCycleSession->SessionCanceld=0;
                                    $modelCycleSession->SessionDeleted=0;
                                    $modelCycleSession->Active=1;
                                    $modelCycleSession->Created=date("Y-m-d h:i:sa");
                                    $modelCycleSession->CreatedBy=Yii::app ()->user->userid;
                                    $modelCycleSession->Updated=date("Y-m-d h:i:sa");
                                    $modelCycleSession->UpdatedBy=Yii::app ()->user->userid;

                                    $modelSessions[$counter]=$modelCycleSession;
                                    $counter=$counter+1;
                                }
                                else
                                {
                                    $error=1;
                                    break;
                                }
                            }
                            $Date->modify('+1 day');                          
                        }
                        
			if($error===0 and $counter>0)
                        {
                            $trans = Yii::app()->db->beginTransaction();
                            try 
                            {
                                foreach ($modelSessions as $Session)
                                {
                                    $modelCycleSession=new CycleSession();
                                    $modelCycleSession=$Session;
                                    if($modelCycleSession->validate())
                                        $modelCycleSession->save();
                                    else {
                                        trigger_error("Operation did not Succeed", E_USER_ERROR);
                                    }
                                }
                                $trans->commit();
                                $this->redirect(array('cycle/detailView','id'=>$CycleID));
                            }
                            catch (Exception $ex) 
                            {
                                $trans->rollback();
                            }
                        }
                        else
                        {
                            
                        }
		}
                
            $this->render('WeekTemplate',array(
                    'model'=>$this->loadModelCycle($id),'modelWeek'=>$modelWeek
            ));
	}
        
        public function loadModelCycle($id)
	{
		$model=Cycle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionfillCourse() {
            $Parent = $_POST['CycleSession']['ProgramID'];
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
            $Parent = $_POST['CycleSession']['CourseID'];
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
            $Parent = $_POST['CycleSession']['LevelID'];
            $data=  Cycle::model()->findAll('Active =1 and LevelID=:cat_id',
                    array(':cat_id'=> $Parent));

             $data=CHtml::listData($data,'CycleID','CycleName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
        public function actionfillSubject() {
            $Parent = $_POST['CycleSession']['CycleID'];
            
            $c = new CDbCriteria;
            $c->select = ['t.SubjectID, t.SubjectName'];
           // $c->from=["tbl_mstr_subject t"];
            $c->join = "INNER JOIN tbl_cycle_subject b ON t.SubjectID = b.SubjectID and b.Active=1";
            $c->compare("b.CycleID", $Parent);

            $result=Subject::model()->findAll($c);
            $data = CHtml::listData($result, 'SubjectID', 'SubjectName');
             
            echo CHtml::tag('option',
                              array('value'=>NULL),CHtml::encode('-- Select --'),true);
            
              foreach($data as $value=>$SubjectName)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($SubjectName),true);
                }

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
		$model=new CycleSession;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CycleSession']))
		{
			$model->attributes=$_POST['CycleSession'];
                        $model->Active=1;
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->SessionCanceld=0;
                        $model->SessionDeleted=0;
                                    
			if($model->save())
				$this->redirect(array('view','id'=>$model->SessionID));
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

		if(isset($_POST['CycleSession']))
		{
			$model->attributes=$_POST['CycleSession'];
                        
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->SessionID));
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
		$dataProvider=new CActiveDataProvider('CycleSession');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CycleSession('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CycleSession']))
			$model->attributes=$_GET['CycleSession'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CycleSession the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CycleSession::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CycleSession $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cycle-session-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
