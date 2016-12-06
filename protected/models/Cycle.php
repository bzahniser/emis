<?php

/**
 * This is the model class for table "tbl_cycle".
 *
 * The followings are the available columns in table 'tbl_cycle':
 * @property integer $ProgramID
 * @property integer $CycleID
 * @property string $CycleName
 * @property string $CycleDescription
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $CountryID
 * @property integer $CityID
 * @property integer $CenterID
 * @property integer $Room
 * @property string $StartDate
 * @property string $EndDate
 * @property integer $AgeID
 * @property integer $AgeFlexability
 * @property integer $NumberOfStudent
 * @property string $NumberOfHours
 * @property integer $FacilitatorID
 * @property integer $Certification
 * @property integer $CoordinatorID
 * @property integer $Transportation
 * @property integer $CycleEnd
 * @property string $CycleEndDate
 * @property string $CycleEndTS
 * @property integer $CycleEndBy
 * @property integer $AttendancePerSubject
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Attendance[] $attendances
 * @property AgeRange $age
 * @property Center $center
 * @property City $city
 * @property Coordinator $coordinator
 * @property Country $country
 * @property Course $course
 * @property Facilitator $facilitator
 * @property Level $level
 * @property Program $program
 * @property User $createdBy
 * @property User $cycleEndBy
 * @property User $updatedBy
 * @property CycleEnrolment[] $cycleEnrolments
 * @property CycleExam[] $cycleExams
 * @property CycleSession[] $cycleSessions
 * @property CycleSubject[] $cycleSubjects
 * @property Leave[] $leaves
 * @property StudentExam[] $studentExams
 */
class Cycle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cycle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CycleName, CourseID, LevelID, Certification, CoordinatorID, Transportation, AttendancePerSubject, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, CourseID, LevelID, CountryID, CityID, CenterID, Room, AgeID, AgeFlexability, NumberOfStudent, FacilitatorID, Certification, CoordinatorID, Transportation, CycleEnd, CycleEndBy, AttendancePerSubject, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('CycleName, CycleDescription', 'length', 'max'=>25),
			array('NumberOfHours', 'length', 'max'=>10),
			array('StartDate, EndDate, CycleEndDate, CycleEndTS', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, CycleID, CycleName, CycleDescription, CourseID, LevelID, CountryID, CityID, CenterID, Room, StartDate, EndDate, AgeID, AgeFlexability, NumberOfStudent, NumberOfHours, FacilitatorID, Certification, CoordinatorID, Transportation, CycleEnd, CycleEndDate, CycleEndTS, CycleEndBy, AttendancePerSubject, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'attendances' => array(self::HAS_MANY, 'Attendance', 'CycleID'),
			'age' => array(self::BELONGS_TO, 'AgeRange', 'AgeID'),
			'center' => array(self::BELONGS_TO, 'Center', 'CenterID'),
			'city' => array(self::BELONGS_TO, 'City', 'CityID'),
			'coordinator' => array(self::BELONGS_TO, 'Coordinator', 'CoordinatorID'),
			'country' => array(self::BELONGS_TO, 'Country', 'CountryID'),
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'facilitator' => array(self::BELONGS_TO, 'Facilitator', 'FacilitatorID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'cycleEndBy' => array(self::BELONGS_TO, 'User', 'CycleEndBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'cycleEnrolments' => array(self::HAS_MANY, 'CycleEnrolment', 'CycleID'),
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'CycleID'),
			'cycleSessions' => array(self::HAS_MANY, 'CycleSession', 'CycleID'),
			'cycleSubjects' => array(self::HAS_MANY, 'CycleSubject', 'CycleID'),
			'leaves' => array(self::HAS_MANY, 'Leave', 'CycleID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'CycleID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'CycleID' => 'Cycle',
			'CycleName' => 'Cycle Name',
			'CycleDescription' => 'Cycle Description',
			'CourseID' => 'Course',
			'LevelID' => 'Level',
			'CountryID' => 'Country',
			'CityID' => 'City',
			'CenterID' => 'Center',
			'Room' => 'Room',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'AgeID' => 'Age',
			'AgeFlexability' => 'Age Flexability',
			'NumberOfStudent' => 'Cycle Capacity',
			'NumberOfHours' => 'Number Of Hours',
			'FacilitatorID' => 'Facilitator',
			'Certification' => 'Certification',
			'CoordinatorID' => 'Coordinator',
			'Transportation' => 'Transportation',
			'CycleEnd' => 'Cycle End',
			'CycleEndDate' => 'Cycle End Date',
			'CycleEndTS' => 'Cycle End Ts',
			'CycleEndBy' => 'Cycle End By',
			'AttendancePerSubject' => 'Attendance Per Subject',
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
		$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('CycleName',$this->CycleName,true);
		$criteria->compare('CycleDescription',$this->CycleDescription,true);
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('LevelID',$this->LevelID);
		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('CenterID',$this->CenterID);
		$criteria->compare('Room',$this->Room);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('AgeID',$this->AgeID);
		$criteria->compare('AgeFlexability',$this->AgeFlexability);
		$criteria->compare('NumberOfStudent',$this->NumberOfStudent);
		$criteria->compare('NumberOfHours',$this->NumberOfHours,true);
		$criteria->compare('FacilitatorID',$this->FacilitatorID);
		$criteria->compare('Certification',$this->Certification);
		$criteria->compare('CoordinatorID',$this->CoordinatorID);
		$criteria->compare('Transportation',$this->Transportation);
		$criteria->compare('CycleEnd',$this->CycleEnd);
		$criteria->compare('CycleEndDate',$this->CycleEndDate,true);
		$criteria->compare('CycleEndTS',$this->CycleEndTS,true);
		$criteria->compare('CycleEndBy',$this->CycleEndBy);
		$criteria->compare('AttendancePerSubject',$this->AttendancePerSubject);
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
	 * @return Cycle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
