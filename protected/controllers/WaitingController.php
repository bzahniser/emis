<?php

class WaitingController extends Controller
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
				'actions'=>array('create','createEnrol','FindPostCode','fillCourse','fillLevel'),
				'roles'=>array('WaitingCreate'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','Activate','InActivate'),
				'roles'=>array('WaitingUpdate'),
			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','admin'),
				'roles'=>array('WaitingRead'),
			),
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('delete'),
				'roles'=>array('WaitingDelete'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('WaitingView'),
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
	public function actionFindPostCode() {
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
        
        public function actionfillCourse() {
            $ProgramID = $_POST['Waiting']['ProgramID'];
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
            $CourseID = $_POST['Waiting']['CourseID'];
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
		$model=new Waiting;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Waiting']))
		{
			$model->attributes=$_POST['Waiting'];
                        
                        $model->Created= date("Y-m-d h:i:sa");
                        $model->CreatedBy= Yii::app ()->user->userid;
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        $model->Enrolled=0;
                        $model->Active=1;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->WaitingID));
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

		if(isset($_POST['Waiting']))
		{
			$model->attributes=$_POST['Waiting'];
                    
                        $model->Updated= date("Y-m-d h:i:sa");
                        $model->UpdatedBy= Yii::app ()->user->userid;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->WaitingID));
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
		$dataProvider=new CActiveDataProvider('Waiting');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Waiting('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Waiting']))
			$model->attributes=$_GET['Waiting'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Waiting the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Waiting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Waiting $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='waiting-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
