<?php

/**
 * This is the model class for table "tbl_course".
 *
 * The followings are the available columns in table 'tbl_course':
 * @property integer $ProgramID
 * @property integer $CourseID
 * @property string $CourseCode
 * @property string $CourseName
 * @property string $CourseDescription
 * @property string $Provider
 * @property integer $IsSchool
 * @property integer $CoordinatorID
 * @property integer $CourseTypeID
 * @property integer $CourseGroupID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Attendance[] $attendances
 * @property Coordinator $coordinator
 * @property CourseGroup $courseGroup
 * @property CourseType $courseType
 * @property Program $program
 * @property User $createdBy
 * @property User $updatedBy
 * @property Cycle[] $cycles
 * @property CycleEnrolment[] $cycleEnrolments
 * @property CycleExam[] $cycleExams
 * @property CycleSubject[] $cycleSubjects
 * @property Level[] $levels
 * @property LevelExam[] $levelExams
 * @property LevelSubject[] $levelSubjects
 * @property StudentExam[] $studentExams
 * @property Waiting[] $waitings
 */
class Course extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CourseName, IsSchool, CoordinatorID, CourseTypeID, CourseGroupID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, IsSchool, CoordinatorID, CourseTypeID, CourseGroupID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('CourseCode, CourseName, CourseDescription, Provider', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, CourseID, CourseCode, CourseName, CourseDescription, Provider, IsSchool, CoordinatorID, CourseTypeID, CourseGroupID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'attendances' => array(self::HAS_MANY, 'Attendance', 'CourseID'),
			'coordinator' => array(self::BELONGS_TO, 'Coordinator', 'CoordinatorID'),
			'courseGroup' => array(self::BELONGS_TO, 'CourseGroup', 'CourseGroupID'),
			'courseType' => array(self::BELONGS_TO, 'CourseType', 'CourseTypeID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'CourseID'),
			'cycleEnrolments' => array(self::HAS_MANY, 'CycleEnrolment', 'CourseID'),
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'CourseID'),
			'cycleSubjects' => array(self::HAS_MANY, 'CycleSubject', 'CourseID'),
			'levels' => array(self::HAS_MANY, 'Level', 'CourseID'),
			'levelExams' => array(self::HAS_MANY, 'LevelExam', 'CourseID'),
			'levelSubjects' => array(self::HAS_MANY, 'LevelSubject', 'CourseID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'CourseID'),
			'waitings' => array(self::HAS_MANY, 'Waiting', 'CourseID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'CourseID' => 'Course',
			'CourseCode' => 'Course Code',
			'CourseName' => 'Course Name',
			'CourseDescription' => 'Course Description',
			'Provider' => 'Provider',
			'IsSchool' => 'Is School',
			'CoordinatorID' => 'Coordinator',
			'CourseTypeID' => 'Course Type',
			'CourseGroupID' => 'Course Group',
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
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('CourseCode',$this->CourseCode,true);
		$criteria->compare('CourseName',$this->CourseName,true);
		$criteria->compare('CourseDescription',$this->CourseDescription,true);
		$criteria->compare('Provider',$this->Provider,true);
		$criteria->compare('IsSchool',$this->IsSchool);
		$criteria->compare('CoordinatorID',$this->CoordinatorID);
		$criteria->compare('CourseTypeID',$this->CourseTypeID);
		$criteria->compare('CourseGroupID',$this->CourseGroupID);
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
	 * @return Course the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
