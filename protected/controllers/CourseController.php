<?php

class CourseController extends Controller
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
				'actions'=>array('create'),
				'roles'=>array('CourseCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','Activate','InActivate'),
				'roles'=>array('CourseUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'roles'=>array('CourseRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('CourseDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view','detailView','WidgetView'),
				'roles'=>array('CourseView'),
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
        
        public function actiondetailView($id)
	{
		$model=$this->loadModel($id);
		$this->render('detailView',array(
			'model'=>$model,
		));
	}
        
        public function actionWidgetView($id)
	{
            if(Yii::app()->request->isAjaxRequest)
            {             
                $typ=substr($id,0,6);
                //$t=strlen($id);
                $id=substr($id,6,strlen($id)-6);
                if ((int)$typ===100000)//Level
                {
                    $modelLevel=$this->loadModelLevel($id);
                    $this->renderPartial('//level/CourseLevelWidget',array('model'=>$modelLevel),false,true);
                }
                elseif ((int)$typ===200000)//World Subject
                {
                    $modelCycle=$this->loadModelCycle($id);
                    $this->renderPartial('//cycle/CourseCycleWidget',array('model'=>$modelCycle),false,true);
                }
                elseif ((int)$typ===300000)//World Subject
                {
                    
                }
                elseif ((int)$typ===350000)//World Exam
                {
                    
                }
                elseif ((int)$typ===400000) //Exam
                {
                    $modelExam=$this->loadModelExam($id);
                    $this->renderPartial('//exam/CourseExamWidget',array('model'=>$modelExam),false,true);
                }
                elseif ((int)$typ===500000) //Subject
                {
                    $modelSubject=$this->loadModelSubject($id);
                    $this->renderPartial('//subject/CourseSubjectWidget',array('model'=>$modelSubject),false,true);
                }
            }
        }
      
        public function loadModelLevel($id)
	{
		$modelLevel=Level::model()->findByPk($id);
		if($modelLevel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelLevel;
	}
        
        public function loadModelCycle($id)
	{
		$modelCycle=Cycle::model()->findByPk($id);
		if($modelCycle===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelCycle;
	}
        
        public function loadModelExam($id)
	{
		$modelExam=Exam::model()->findByPk($id);
		if($modelExam===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelExam;
	}
        
        public function loadModelSubject($id)
	{
		$modelSubject=Subject::model()->findByPk($id);
		if($modelSubject===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $modelSubject;
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(Yii::app()->request->isAjaxRequest)
                {
			$this->renderPartial('view',array(
				'model'=>$this->loadModel($id),
			),false,true);
                }
		else
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
		$model=new Course;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Course']))
		{
			$model->attributes=$_POST['Course'];
                        
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->Active=1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->CourseID));
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

		if(isset($_POST['Course']))
		{
			$model->attributes=$_POST['Course'];
                      
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->CourseID));
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
		$dataProvider=new CActiveDataProvider('Course');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Course('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Course']))
			$model->attributes=$_GET['Course'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Course the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Course::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Course $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='course-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
