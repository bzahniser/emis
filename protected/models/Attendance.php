<?php

/**
 * This is the model class for table "tbl_attendance".
 *
 * The followings are the available columns in table 'tbl_attendance':
 * @property integer $ProgramID
 * @property integer $AttendanceID
 * @property integer $StudentID
 * @property integer $FacilitatorID
 * @property integer $CycleID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $Present
 * @property integer $Absent
 * @property integer $SessionID
 * @property string $AttendanceDate
 * @property integer $UserID
 * @property integer $EnrolmentID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Cycle $cycle
 * @property CycleEnrolment $enrolment
 * @property CycleSession $session
 * @property Facilitator $facilitator
 * @property Level $level
 * @property Program $program
 * @property Student $student
 * @property User $createdBy
 * @property User $updatedBy
 * @property User $user
 */
class Attendance extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_attendance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, StudentID, FacilitatorID, CycleID, CourseID, LevelID, Present, Absent, SessionID, AttendanceDate, EnrolmentID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, StudentID, FacilitatorID, CycleID, CourseID, LevelID, Present, Absent, SessionID, UserID, EnrolmentID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, AttendanceID, StudentID, FacilitatorID, CycleID, CourseID, LevelID, Present, Absent, SessionID, AttendanceDate, UserID, EnrolmentID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'cycle' => array(self::BELONGS_TO, 'Cycle', 'CycleID'),
			'enrolment' => array(self::BELONGS_TO, 'CycleEnrolment', 'EnrolmentID'),
			'session' => array(self::BELONGS_TO, 'CycleSession', 'SessionID'),
			'facilitator' => array(self::BELONGS_TO, 'Facilitator', 'FacilitatorID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'student' => array(self::BELONGS_TO, 'Student', 'StudentID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'user' => array(self::BELONGS_TO, 'User', 'UserID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'AttendanceID' => 'Attendance',
			'StudentID' => 'Student',
			'FacilitatorID' => 'Facilitator',
			'CycleID' => 'Cycle',
			'CourseID' => 'Course',
			'LevelID' => 'Level',
			'Present' => 'Present',
			'Absent' => 'Absent',
			'SessionID' => 'Session',
			'AttendanceDate' => 'Attendance Date',
			'UserID' => 'User',
			'EnrolmentID' => 'Enrolment',
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
                $criteria->with='student';
               
                $criteria->join = " LEFT OUTER JOIN tbl_cycle cycle ON t.CycleID = cycle.CycleID "
                                . " LEFT OUTER JOIN tbl_level level ON t.LevelID = level.LevelID "
                               // . " LEFT OUTER JOIN tbl_Level level ON t.LevelID = level.LevelID "
                        ;
                $criteria->compare('student.FullName',$this->StudentID,true);
                $criteria->compare('cycle.CycleName',$this->CycleID,true);
                $criteria->compare('level.LevelName',$this->LevelID);
                
		$criteria->compare('ProgramID',$this->ProgramID);
		$criteria->compare('AttendanceID',$this->AttendanceID);
		$criteria->compare('FacilitatorID',$this->FacilitatorID);
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('Present',$this->Present);
		$criteria->compare('Absent',$this->Absent);
		$criteria->compare('SessionID',$this->SessionID);
		$criteria->compare('AttendanceDate',$this->AttendanceDate,true);
		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('EnrolmentID',$this->EnrolmentID);
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
	 * @return Attendance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
