<?php

/**
 * This is the model class for table "tbl_level".
 *
 * The followings are the available columns in table 'tbl_level':
 * @property integer $ProgramID
 * @property integer $LevelID
 * @property string $LevelName
 * @property string $LevelDescription
 * @property integer $CourseID
 * @property integer $LevelCertification
 * @property integer $RangeID
 * @property integer $AgeFlexability
 * @property integer $NumberOfHours
 * @property integer $CoordinatorID
 * @property integer $Sequence
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Attendance[] $attendances
 * @property Cycle[] $cycles
 * @property CycleEnrolment[] $cycleEnrolments
 * @property CycleExam[] $cycleExams
 * @property CycleSubject[] $cycleSubjects
 * @property AgeRange $range
 * @property Coordinator $coordinator
 * @property Program $program
 * @property User $createdBy
 * @property User $updatedBy
 * @property Course $course
 * @property LevelExam[] $levelExams
 * @property LevelSubject[] $levelSubjects
 * @property StudentExam[] $studentExams
 * @property Waiting[] $waitings
 */
class Level extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, LevelName, CourseID, RangeID, AgeFlexability, CoordinatorID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, CourseID, LevelCertification, RangeID, AgeFlexability, NumberOfHours, CoordinatorID, Sequence, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('LevelName, LevelDescription', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, LevelID, LevelName, LevelDescription, CourseID, LevelCertification, RangeID, AgeFlexability, NumberOfHours, CoordinatorID, Sequence, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'attendances' => array(self::HAS_MANY, 'Attendance', 'LevelID'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'LevelID'),
			'cycleEnrolments' => array(self::HAS_MANY, 'CycleEnrolment', 'LevelID'),
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'LevelID'),
			'cycleSubjects' => array(self::HAS_MANY, 'CycleSubject', 'LevelID'),
			'range' => array(self::BELONGS_TO, 'AgeRange', 'RangeID'),
			'coordinator' => array(self::BELONGS_TO, 'Coordinator', 'CoordinatorID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'levelExams' => array(self::HAS_MANY, 'LevelExam', 'LevelID'),
			'levelSubjects' => array(self::HAS_MANY, 'LevelSubject', 'LevelID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'LevelID'),
			'waitings' => array(self::HAS_MANY, 'Waiting', 'LevelID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'LevelID' => 'Level',
			'LevelName' => 'Level Name',
			'LevelDescription' => 'Level Description',
			'CourseID' => 'Course',
			'LevelCertification' => 'Level Certification',
			'RangeID' => 'Range',
			'AgeFlexability' => 'Age Flexability',
			'NumberOfHours' => 'Number Of Hours',
			'CoordinatorID' => 'Coordinator',
			'Sequence' => 'Sequence',
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
		$criteria->compare('LevelID',$this->LevelID);
		$criteria->compare('LevelName',$this->LevelName,true);
		$criteria->compare('LevelDescription',$this->LevelDescription,true);
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('LevelCertification',$this->LevelCertification);
		$criteria->compare('RangeID',$this->RangeID);
		$criteria->compare('AgeFlexability',$this->AgeFlexability);
		$criteria->compare('NumberOfHours',$this->NumberOfHours);
		$criteria->compare('CoordinatorID',$this->CoordinatorID);
		$criteria->compare('Sequence',$this->Sequence);
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
	 * @return Level the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
