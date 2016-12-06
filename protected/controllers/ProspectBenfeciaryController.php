<?php

class ProspectBenfeciaryController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','fillCity'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionfillCity() {
            $Parent = $_POST['Prospectbenfeciary']['SatutsID'];
           
            $c = new CDbCriteria;
            $c->select = ['t.CityID, t.CityName'];
           // $c->from=["tbl_mstr_subject t"];
            $c->join = "INNER JOIN tbl_prostatus b ON t.CountryID = b.CountryID and b.Active=1";
            $c->compare("b.ID", $Parent);

            $result=City::model()->findAll($c);
            $data = CHtml::listData($result, 'CityID', 'CityName');
             
             echo CHtml::tag('option',
                               array('value'=>NULL),CHtml::encode('-- Select --'),true);
             
              foreach($data as $value=>$Child)
                {
                    echo CHtml::tag('option',
                               array('value'=>$value),CHtml::encode($Child),true);
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
		$model=new ProspectBenfeciary;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Prospectbenfeciary']))
		{
			$model->attributes=$_POST['Prospectbenfeciary'];
                        
                        $model->FullName=$model->Name.' '.$model->LastName;
                        $model->ArabicFullName=$model->ArabicName.' '.$model->ArabicLastName;
                        
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2', array(':id1'=>Yii::app()->user->getState('userid'), ':id2'=>'RgistrationCityID'))
                                                    ->queryRow();
                        $model->CurrentCityID=(int)$df;
                        
                        $df = Yii::app()->db->createCommand()
                                                    ->select('DefaultValue')
                                                    ->from('tbl_user_default')
                                                    ->where('UserID=:id1 and FieldName=:id2', array(':id1'=>Yii::app()->user->getState('userid'), ':id2'=>'RgistrationCountryID'))
                                                    ->queryRow();
                        $model->CurrentCountryID=(int)$df;
                        $model->OriginalCountryID=$model->satuts->CountryID;
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->Active=1;
                        
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

		if(isset($_POST['ProspectBenfeciary']))
		{
			$model->attributes=$_POST['ProspectBenfeciary'];
                        $model->FullName=$model->Name.' '.$model->LastName;
                        $model->ArabicFullName=$model->ArabicName.' '.$model->ArabicLastName;
                        $model->OriginalCountryID=$model->satuts->CountryID;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
          
                        
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
		$dataProvider=new CActiveDataProvider('ProspectBenfeciary');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProspectBenfeciary('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProspectBenfeciary']))
			$model->attributes=$_GET['ProspectBenfeciary'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProspectBenfeciary the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProspectBenfeciary::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProspectBenfeciary $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='prospect-benfeciary-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
