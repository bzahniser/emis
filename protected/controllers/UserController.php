<?php

class UserController extends Controller
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
				'roles'=>array('UserCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','Activate','InActivate','changePassword'),
				'roles'=>array('UserUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('changeMyPassword'),
				'roles'=>array('UserRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('UserDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','admin','view'),
				'roles'=>array('UserView'),
			),
                        array('allow',  // deny all users
				'users'=>array('*'),
                                'actions'=>array('changeMyPassword'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionchangeMyPassword()
	{
            $model=$this->loadModel(Yii::app ()->user->userid);
            $errors=array();
            if(isset($_POST['User']))
            {
                if($model->Password===crypt($_POST['CurrentPassword'],'salt'))
                {
                    if (isset($_POST['NewPassword']) and isset($_POST['ConfirmPassword']) and $_POST['NewPassword']<>"" and $_POST['NewPassword']===$_POST['ConfirmPassword'])
                    {
                        $model->Password=crypt($_POST['NewPassword'],'salt');
                        $model->save();
                        $this->redirect(array('/site/index'));
                    }
                    else
                    {
                        $errors[]='Confirm pasword do not match';
                    }
                }
                else 
                    $errors[]='Current Password don not match';
            }
            $this->render('changeMyPassword',array(
                    'model'=>$model,'errors'=>$errors
            ));
	}
        
        public function actionchangePassword()
	{
            
            $errors=array();
            if(isset($_POST['UserID']))
            {
                $model=$this->loadModel($_POST['UserID']);
                $model->Password=crypt($_POST['NewPassword'],'salt');
                $model->save();
            }
            $this->render('changePassword',array());
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
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
                $modelAuthAss=new AuthAssignment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
                        $modelAuthAss->attributes=$_POST['Authassignment'];
                        $model->Password=crypt($model->Password,'salt');
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
						$model->Active=1;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
			if($model->save())
                        {
                            $modelAuthAss->userid=$model->UserID;
                            $modelAuthAss->data='N;';
                            $modelAuthAss->save();
                            $this->redirect(array('view','id'=>$model->UserID));
                        }
		}

		$this->render('create',array(
			'model'=>$model,'modelAuthAss'=>$modelAuthAss,
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

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
                   
                                
                        $model->Password=crypt($model->Password,'salt');
                        
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        
			if($model->save())
                        {
                            $this->redirect(array('view','id'=>$model->UserID));
                        }
		}
		$this->render('update',array(
			'model'=>$model
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
