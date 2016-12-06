<?php

/**
 * This is the model class for table "tbl_waiting".
 *
 * The followings are the available columns in table 'tbl_waiting':
 * @property integer $ProgramID
 * @property integer $WaitingID
 * @property integer $StudentID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $Enrolled
 * @property string $EnrolmentDate
 * @property string $CycleStartDate
 * @property integer $InformedOfCycleOpening
 * @property integer $Closed
 * @property string $CloseDate
 * @property integer $ClosedBy
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property CycleEnrolment[] $cycleEnrolments
 * @property Course $course
 * @property Level $level
 * @property Program $program
 * @property Student $student
 * @property User $closedBy
 * @property User $createdBy
 * @property User $updatedBy
 */
class Waiting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_waiting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, StudentID, CourseID, LevelID, Enrolled, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, StudentID, CourseID, LevelID, Enrolled, EnrolmentID, CycleID, InformedOfCycleOpening, Closed, ClosedBy, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('EnrolmentDate, CycleStartDate, CloseDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, WaitingID, StudentID, CourseID, LevelID, Enrolled, EnrolmentID, CycleID, EnrolmentDate, CycleStartDate, InformedOfCycleOpening, Closed, CloseDate, ClosedBy, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'cycleEnrolments' => array(self::HAS_MANY, 'CycleEnrolment', 'WaitingID'),
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'student' => array(self::BELONGS_TO, 'Student', 'StudentID'),
			'closedBy' => array(self::BELONGS_TO, 'User', 'ClosedBy'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
                        'cycle' => array(self::BELONGS_TO, 'Cycle', 'CycleID'),
                        'enrolment' => array(self::BELONGS_TO, 'CycleEnrolment', 'EnrolmentID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'WaitingID' => 'Waiting',
			'StudentID' => 'Student',
			'CourseID' => 'Course',
			'LevelID' => 'Level',
			'Enrolled' => 'Enrolled',
			'EnrolmentDate' => 'Enrolment Date',
			'CycleStartDate' => 'Cycle Start Date',
			'InformedOfCycleOpening' => 'Informed Of Cycle Opening',
			'Closed' => 'Closed',
			'CloseDate' => 'Close Date',
			'ClosedBy' => 'Closed By',
			'Active' => 'Active',
			'Created' => 'Created',
			'CreatedBy' => 'Created By',
			'Updated' => 'Updated',
			'UpdatedBy' => 'Updated By',
                        'EnrolmentID'=>'Enrollment', 
                        'CycleID'=>'Cycle',
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
                $criteria->compare('student.FullName',$this->StudentID,true);
                $criteria->compare('LevelID',$this->LevelID,true);
		$criteria->compare('t.ProgramID',$this->ProgramID);
		$criteria->compare('WaitingID',$this->WaitingID);
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('Enrolled',$this->Enrolled);
		$criteria->compare('EnrolmentDate',$this->EnrolmentDate,true);
		$criteria->compare('CycleStartDate',$this->CycleStartDate,true);
		$criteria->compare('InformedOfCycleOpening',$this->InformedOfCycleOpening);
		$criteria->compare('Closed',$this->Closed);
		$criteria->compare('CloseDate',$this->CloseDate,true);
		$criteria->compare('ClosedBy',$this->ClosedBy);
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
	 * @return Waiting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
