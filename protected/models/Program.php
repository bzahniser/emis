<?php

/**
 * This is the model class for table "tbl_program".
 *
 * The followings are the available columns in table 'tbl_program':
 * @property integer $ProgramID
 * @property string $ProgramName
 * @property string $ProgramDescription
 * @property integer $CountryID
 * @property string $StartDate
 * @property string $BudgetID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Attendance[] $attendances
 * @property Center[] $centers
 * @property Coordinator[] $coordinators
 * @property Course[] $courses
 * @property Cycle[] $cycles
 * @property CycleEnrolment[] $cycleEnrolments
 * @property CycleExam[] $cycleExams
 * @property CycleSession[] $cycleSessions
 * @property CycleSubject[] $cycleSubjects
 * @property Document[] $documents
 * @property Exam[] $exams
 * @property Facilitator[] $facilitators
 * @property Leave[] $leaves
 * @property Level[] $levels
 * @property LevelExam[] $levelExams
 * @property LevelSubject[] $levelSubjects
 * @property Country $country
 * @property User $createdBy
 * @property User $updatedBy
 * @property SessionChangeReason[] $sessionChangeReasons
 * @property Student[] $students
 * @property StudentExam[] $studentExams
 * @property UserDefault[] $userDefaults
 * @property Vacation[] $vacations
 * @property Valuechange[] $valuechanges
 * @property Waiting[] $waitings
 */
class Program extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_program';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramName, CountryID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('CountryID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('ProgramName, BudgetID', 'length', 'max'=>25),
			array('ProgramDescription', 'length', 'max'=>50),
			array('StartDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, ProgramName, ProgramDescription, CountryID, StartDate, BudgetID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'attendances' => array(self::HAS_MANY, 'Attendance', 'ProgramID'),
			'centers' => array(self::HAS_MANY, 'Center', 'ProgramID'),
			'coordinators' => array(self::HAS_MANY, 'Coordinator', 'ProgramID'),
			'courses' => array(self::HAS_MANY, 'Course', 'ProgramID'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'ProgramID'),
			'cycleEnrolments' => array(self::HAS_MANY, 'CycleEnrolment', 'ProgramID'),
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'ProgramID'),
			'cycleSessions' => array(self::HAS_MANY, 'CycleSession', 'ProgramID'),
			'cycleSubjects' => array(self::HAS_MANY, 'CycleSubject', 'ProgramID'),
			'documents' => array(self::HAS_MANY, 'Document', 'ProgramID'),
			'exams' => array(self::HAS_MANY, 'Exam', 'ProgramID'),
			'facilitators' => array(self::HAS_MANY, 'Facilitator', 'ProgramID'),
			'leaves' => array(self::HAS_MANY, 'Leave', 'ProgramID'),
			'levels' => array(self::HAS_MANY, 'Level', 'ProgramID'),
			'levelExams' => array(self::HAS_MANY, 'LevelExam', 'ProgramID'),
			'levelSubjects' => array(self::HAS_MANY, 'LevelSubject', 'ProgramID'),
			'country' => array(self::BELONGS_TO, 'Country', 'CountryID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'sessionChangeReasons' => array(self::HAS_MANY, 'SessionChangeReason', 'ProgramID'),
			'students' => array(self::HAS_MANY, 'Student', 'ProgramID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'ProgramID'),
			'userDefaults' => array(self::HAS_MANY, 'UserDefault', 'ProgramID'),
			'vacations' => array(self::HAS_MANY, 'Vacation', 'ProgramID'),
			'valuechanges' => array(self::HAS_MANY, 'Valuechange', 'ProgramID'),
			'waitings' => array(self::HAS_MANY, 'Waiting', 'ProgramID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'ProgramName' => 'Program Name',
			'ProgramDescription' => 'Program Description',
			'CountryID' => 'Country',
			'StartDate' => 'Start Date',
			'BudgetID' => 'Budget',
			'Active' => 'Active',
			'Created' => 'Created',
			'CreatedBy' => 'Created By',
			'Updated' => 'Updated',
			'UpdatedBy' => 'Updated By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ProgramID',$this->ProgramID);
		$criteria->compare('ProgramName',$this->ProgramName,true);
		$criteria->compare('ProgramDescription',$this->ProgramDescription,true);
		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('BudgetID',$this->BudgetID,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('CreatedBy',$this->CreatedBy);
		$criteria->compare('Updated',$this->Updated,true);
		$criteria->compare('UpdatedBy',$this->UpdatedBy);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Program the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
