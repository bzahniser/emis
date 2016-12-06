<?php

class StudentExamController extends Controller
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
				'actions'=>array('create','fillExam','editable','ExamSessionSelect','ExamScoreEntry'),
				'roles'=>array('StudentExamCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','Activate','InActivate','editable'),
				'roles'=>array('StudentExamUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'roles'=>array('StudentExamRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('StudentExamDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('StudentExamView'),
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
        
        public function actioneditable() {
            //$r = Yii::app()->getRequest();
            $PK=$_POST['pk'];
            $Val=$_POST['value'];
            $model=$this->loadModel($PK);
           
            if ($model->cycle->Active==1 and $model->cycle->CycleEnd==0 and $model->Active==1)
            {
                $model->StudentScore=$Val;
                $model->save();
            }
            else 
            {
                    er;
            }
        }
        
        public function actionfillExam() {
            $Parent = $_POST['StudentExam']['CycleID'];
           
            $c = new CDbCriteria;
            $c->select = ['t.ExamID, t.ExamName'];
           // $c->from=["tbl_mstr_subject t"];
            $c->join = "INNER JOIN tbl_cycle_exam b ON t.ExamID = b.ExamID and b.Active=1";
            $c->compare("b.CycleID", $Parent);

            $result=Exam::model()->findAll($c);
            $data = CHtml::listData($result, 'ExamID', 'ExamName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
                }
            
        }
        
        public function actionExamSessionSelect()
	{
                $modelExam=new StudentExam;
                if(isset($_POST['StudentExam']))
		{
                    $modelExam->attributes=$_POST['StudentExam'];
                   if($modelExam->CycleID !="-- Select --" and $modelExam->ExamID !="-- Select --" and $modelExam->ExamDate !="" and $modelExam->ExamTime!="" )
                   {
                        if ((int)$modelExam->StudentScore===1)
                            $command = Yii::app()->db->createCommand("call InsertExam(".$modelExam->CycleID.",".$modelExam->ExamID.",1,0,0,". Yii::app()->user->getState('userid').",'".$modelExam->ExamTime."','".$modelExam->ExamDate."')");
                        else if ((int)$modelExam->StudentScore===2)
                            $command = Yii::app()->db->createCommand("call InsertExam(".$modelExam->CycleID.",".$modelExam->ExamID.",0,1,0,". Yii::app()->user->getState('userid').",'".$modelExam->ExamTime."','".$modelExam->ExamDate."')");
                        else
                            $command = Yii::app()->db->createCommand("call InsertExam(".$modelExam->CycleID.",".$modelExam->ExamID.",0,0,1,". Yii::app()->user->getState('userid').",'".$modelExam->ExamTime."','".$modelExam->ExamDate."')");
                        
                        if ($modelExam->cycle->CycleEnd==0)
                        {
                            $command->execute();
                            $this->redirect(array('ExamScoreEntry','id'=>$modelExam->CycleID,'id2'=>$modelExam->ExamID,'typ'=>$modelExam->StudentScore));
                        }
                   }
                   else {
                       er; //enter cycle and date
                   }
                }
		$this->render('ExamSessionSelect',array('modelExam'=>$modelExam
		));
	}
        
        public function actionExamScoreEntry($id,$id2,$typ)
	{
            $this->render('ExamScoresEntry',array('id'=>$id,'id2'=>$id2,'typ'=>$typ));
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
		$model=new StudentExam;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentExam']))
		{
			$model->attributes=$_POST['StudentExam'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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

		if(isset($_POST['StudentExam']))
		{
			$model->attributes=$_POST['StudentExam'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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
		$dataProvider=new CActiveDataProvider('StudentExam');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentExam('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentExam']))
			$model->attributes=$_GET['StudentExam'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudentExam the loaded model
	 * @throws CHttpException
	 */
        
        
        public function loadModelCycle($id)
	{
		$model=Cycle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
	public function loadModel($id)
	{
		$model=StudentExam::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudentExam $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-exam-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
