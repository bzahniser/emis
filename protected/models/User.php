<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $UserID
 * @property string $LoginName
 * @property string $FirstName
 * @property string $LastName
 * @property string $Mail
 * @property string $Password
 * @property integer $DefaultLanguageID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property AgeRange[] $ageRanges
 * @property AgeRange[] $ageRanges1
 * @property Attendance[] $attendances
 * @property Attendance[] $attendances1
 * @property Attendance[] $attendances2
 * @property Center[] $centers
 * @property Center[] $centers1
 * @property City[] $cities
 * @property City[] $cities1
 * @property Coordinator[] $coordinators
 * @property Coordinator[] $coordinators1
 * @property CoordinatorGroup[] $coordinatorGroups
 * @property CoordinatorGroup[] $coordinatorGroups1
 * @property Country[] $countries
 * @property Country[] $countries1
 * @property Course[] $courses
 * @property Course[] $courses1
 * @property CourseGroup[] $courseGroups
 * @property CourseGroup[] $courseGroups1
 * @property CourseType[] $courseTypes
 * @property CourseType[] $courseTypes1
 * @property Cycle[] $cycles
 * @property Cycle[] $cycles1
 * @property CycleEnrolment[] $cycleEnrolments
 * @property CycleEnrolment[] $cycleEnrolments1
 * @property CycleExam[] $cycleExams
 * @property CycleExam[] $cycleExams1
 * @property CycleSession[] $cycleSessions
 * @property CycleSession[] $cycleSessions1
 * @property CycleSubject[] $cycleSubjects
 * @property CycleSubject[] $cycleSubjects1
 * @property Document[] $documents
 * @property Document[] $documents1
 * @property DocumentType[] $documentTypes
 * @property DocumentType[] $documentTypes1
 * @property Exam[] $exams
 * @property Exam[] $exams1
 * @property Facilitator[] $facilitators
 * @property Facilitator[] $facilitators1
 * @property FamilyRelation[] $familyRelations
 * @property FamilyRelation[] $familyRelations1
 * @property Leave[] $leaves
 * @property Leave[] $leaves1
 * @property Leavereason[] $leavereasons
 * @property Leavereason[] $leavereasons1
 * @property Level[] $levels
 * @property Level[] $levels1
 * @property LevelExam[] $levelExams
 * @property LevelExam[] $levelExams1
 * @property LevelSubject[] $levelSubjects
 * @property LevelSubject[] $levelSubjects1
 * @property MedicalStatus[] $medicalStatuses
 * @property MedicalStatus[] $medicalStatuses1
 * @property Program[] $programs
 * @property Program[] $programs1
 * @property SessionChangeReason[] $sessionChangeReasons
 * @property SessionChangeReason[] $sessionChangeReasons1
 * @property Student[] $students
 * @property Student[] $students1
 * @property Student[] $students2
 * @property StudentExam[] $studentExams
 * @property StudentExam[] $studentExams1
 * @property Subject[] $subjects
 * @property Subject[] $subjects1
 * @property UserDefault[] $userDefaults
 * @property UserDefault[] $userDefaults1
 * @property UserDefault[] $userDefaults2
 * @property Vacation[] $vacations
 * @property Vacation[] $vacations1
 * @property Valuechange[] $valuechanges
 * @property Valuechange[] $valuechanges1
 * @property Waiting[] $waitings
 * @property Waiting[] $waitings1
 * @property Waiting[] $waitings2
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LoginName, FirstName, LastName, Mail, Password, Active', 'required'),
			array('ProgramID, SessionOnlyAttendance, FacilitatorID, CoordinatorID, DefaultLanguageID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('LoginName, FirstName, LastName, Mail, Password', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, SessionOnlyAttendance, FacilitatorID, CoordinatorID, UserID, LoginName, FirstName, LastName, Mail, Password, DefaultLanguageID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
                        'facilitator' => array(self::BELONGS_TO, 'Facilitator', 'FacilitatorID'),
                        'coordinator' => array(self::BELONGS_TO, 'Coordinator', 'CoordinatorID'),
                        'program'  => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'ageRanges' => array(self::HAS_MANY, 'AgeRange', 'CreatedBy'),
			'ageRanges1' => array(self::HAS_MANY, 'AgeRange', 'UpdatedBy'),
			'attendances' => array(self::HAS_MANY, 'Attendance', 'CreatedBy'),
			'attendances1' => array(self::HAS_MANY, 'Attendance', 'UpdatedBy'),
			'attendances2' => array(self::HAS_MANY, 'Attendance', 'UserID'),
			'centers' => array(self::HAS_MANY, 'Center', 'CreatedBy'),
			'centers1' => array(self::HAS_MANY, 'Center', 'UpdatedBy'),
			'cities' => array(self::HAS_MANY, 'City', 'CreatedBy'),
			'cities1' => array(self::HAS_MANY, 'City', 'UpdatedBy'),
			'coordinators' => array(self::HAS_MANY, 'Coordinator', 'CreatedBy'),
			'coordinators1' => array(self::HAS_MANY, 'Coordinator', 'UpdatedBy'),
			'coordinatorGroups' => array(self::HAS_MANY, 'CoordinatorGroup', 'CreatedBy'),
			'coordinatorGroups1' => array(self::HAS_MANY, 'CoordinatorGroup', 'UpdatedBy'),
			'countries' => array(self::HAS_MANY, 'Country', 'CreatedBy'),
			'countries1' => array(self::HAS_MANY, 'Country', 'UpdatedBy'),
			'courses' => array(self::HAS_MANY, 'Course', 'CreatedBy'),
			'courses1' => array(self::HAS_MANY, 'Course', 'UpdatedBy'),
			'courseGroups' => array(self::HAS_MANY, 'CourseGroup', 'CreatedBy'),
			'courseGroups1' => array(self::HAS_MANY, 'CourseGroup', 'UpdatedBy'),
			'courseTypes' => array(self::HAS_MANY, 'CourseType', 'CreatedBy'),
			'courseTypes1' => array(self::HAS_MANY, 'CourseType', 'UpdatedBy'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'CreatedBy'),
			'cycles1' => array(self::HAS_MANY, 'Cycle', 'UpdatedBy'),
			'cycleEnrolments' => array(self::HAS_MANY, 'CycleEnrolment', 'CreatedBy'),
			'cycleEnrolments1' => array(self::HAS_MANY, 'CycleEnrolment', 'UpdatedBy'),
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'CreatedBy'),
			'cycleExams1' => array(self::HAS_MANY, 'CycleExam', 'UpdatedBy'),
			'cycleSessions' => array(self::HAS_MANY, 'CycleSession', 'CreatedBy'),
			'cycleSessions1' => array(self::HAS_MANY, 'CycleSession', 'UpdatedBy'),
			'cycleSubjects' => array(self::HAS_MANY, 'CycleSubject', 'CreatedBy'),
			'cycleSubjects1' => array(self::HAS_MANY, 'CycleSubject', 'UpdatedBy'),
			'documents' => array(self::HAS_MANY, 'Document', 'CreatedBy'),
			'documents1' => array(self::HAS_MANY, 'Document', 'UpdatedBy'),
			'documentTypes' => array(self::HAS_MANY, 'DocumentType', 'CreatedBy'),
			'documentTypes1' => array(self::HAS_MANY, 'DocumentType', 'UpdatedBy'),
			'exams' => array(self::HAS_MANY, 'Exam', 'CreatedBy'),
			'exams1' => array(self::HAS_MANY, 'Exam', 'UpdatedBy'),
			'facilitators' => array(self::HAS_MANY, 'Facilitator', 'CreatedBy'),
			'facilitators1' => array(self::HAS_MANY, 'Facilitator', 'UpdatedBy'),
			'familyRelations' => array(self::HAS_MANY, 'FamilyRelation', 'CreatedBy'),
			'familyRelations1' => array(self::HAS_MANY, 'FamilyRelation', 'UpdatedBy'),
			'leaves' => array(self::HAS_MANY, 'Leave', 'CreatedBy'),
			'leaves1' => array(self::HAS_MANY, 'Leave', 'UpdatedBy'),
			'leavereasons' => array(self::HAS_MANY, 'Leavereason', 'CreatedBy'),
			'leavereasons1' => array(self::HAS_MANY, 'Leavereason', 'UpdatedBy'),
			'levels' => array(self::HAS_MANY, 'Level', 'CreatedBy'),
			'levels1' => array(self::HAS_MANY, 'Level', 'UpdatedBy'),
			'levelExams' => array(self::HAS_MANY, 'LevelExam', 'CreatedBy'),
			'levelExams1' => array(self::HAS_MANY, 'LevelExam', 'UpdatedBy'),
			'levelSubjects' => array(self::HAS_MANY, 'LevelSubject', 'CreatedBy'),
			'levelSubjects1' => array(self::HAS_MANY, 'LevelSubject', 'UpdatedBy'),
			'medicalStatuses' => array(self::HAS_MANY, 'MedicalStatus', 'CreatedBy'),
			'medicalStatuses1' => array(self::HAS_MANY, 'MedicalStatus', 'UpdatedBy'),
			'programs' => array(self::HAS_MANY, 'Program', 'CreatedBy'),
			'programs1' => array(self::HAS_MANY, 'Program', 'UpdatedBy'),
			'sessionChangeReasons' => array(self::HAS_MANY, 'SessionChangeReason', 'CreatedBy'),
			'sessionChangeReasons1' => array(self::HAS_MANY, 'SessionChangeReason', 'UpdatedBy'),
			'students' => array(self::HAS_MANY, 'Student', 'CreatedBy'),
			'students1' => array(self::HAS_MANY, 'Student', 'RegistrationEmpID'),
			'students2' => array(self::HAS_MANY, 'Student', 'UpdatedBy'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'CreatedBy'),
			'studentExams1' => array(self::HAS_MANY, 'StudentExam', 'UpdatedBy'),
			'subjects' => array(self::HAS_MANY, 'Subject', 'CreatedBy'),
			'subjects1' => array(self::HAS_MANY, 'Subject', 'UpdatedBy'),
			'userDefaults' => array(self::HAS_MANY, 'UserDefault', 'CreatedBy'),
			'userDefaults1' => array(self::HAS_MANY, 'UserDefault', 'UpdatedBy'),
			'userDefaults2' => array(self::HAS_MANY, 'UserDefault', 'UserID'),
			'vacations' => array(self::HAS_MANY, 'Vacation', 'CreatedBy'),
			'vacations1' => array(self::HAS_MANY, 'Vacation', 'UpdatedBy'),
			'valuechanges' => array(self::HAS_MANY, 'Valuechange', 'CreatedBy'),
			'valuechanges1' => array(self::HAS_MANY, 'Valuechange', 'UpdatedBy'),
			'waitings' => array(self::HAS_MANY, 'Waiting', 'ClosedBy'),
			'waitings1' => array(self::HAS_MANY, 'Waiting', 'CreatedBy'),
			'waitings2' => array(self::HAS_MANY, 'Waiting', 'UpdatedBy'),
                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserID' => 'User',
			'LoginName' => 'Login Name',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'Mail' => 'Mail',
			'Password' => 'Password',
			'DefaultLanguageID' => 'Default Language',
			'Active' => 'Active',
			'Created' => 'Created',
			'CreatedBy' => 'Created By',
			'Updated' => 'Updated',
			'UpdatedBy' => 'Updated By',
                        'FacilitatorID'=>'Facilitator',
                        'CoordinatorID'=>'Coordinator',
                        'SessionOnlyAttendance'=> 'Own Session Attendance',
                        'ProgramID'=>'Program'
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

		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('LoginName',$this->LoginName,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Mail',$this->Mail,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('DefaultLanguageID',$this->DefaultLanguageID);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
