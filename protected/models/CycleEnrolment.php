<?php

/**
 * This is the model class for table "tbl_cycle_enrolment".
 *
 * The followings are the available columns in table 'tbl_cycle_enrolment':
 * @property integer $ProgramID
 * @property integer $EnrolmentID
 * @property integer $StudentID
 * @property integer $CycleID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $WaitingID
 * @property integer $Transportation
 * @property integer $Withdrawl
 * @property string $WithdrawlDate
 * @property string $WithdrawlUpdate
 * @property integer $WithdrawlUpdatedBy
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Attendance[] $attendances
 * @property Course $course
 * @property Cycle $cycle
 * @property Level $level
 * @property Program $program
 * @property Student $student
 * @property User $createdBy
 * @property User $updatedBy
 * @property Waiting $waiting
 * @property Leave[] $leaves
 * @property StudentExam[] $studentExams
 */
class CycleEnrolment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cycle_enrolment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, StudentID, CycleID, CourseID, LevelID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, StudentID, CycleID, CourseID, LevelID, WaitingID, Transportation, Withdrawl, WithdrawReasonID, WithdrawlUpdatedBy, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('WithdrawlDate, WithdrawlUpdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, EnrolmentID, StudentID, CycleID, CourseID, LevelID, WaitingID, Transportation, Withdrawl, WithdrawReasonID, WithdrawlDate, WithdrawlUpdate, WithdrawlUpdatedBy, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'attendances' => array(self::HAS_MANY, 'Attendance', 'EnrolmentID'),
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'cycle' => array(self::BELONGS_TO, 'Cycle', 'CycleID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'student' => array(self::BELONGS_TO, 'Student', 'StudentID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'waiting' => array(self::BELONGS_TO, 'Waiting', 'WaitingID'),
			'leaves' => array(self::HAS_MANY, 'Leave', 'EnrolmentID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'EnrolmentID'),
                        'withdrawReason' => array(self::BELONGS_TO, 'WithdrawReason', 'WithdrawReasonID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'EnrolmentID' => 'Enrolment',
			'StudentID' => 'Student',
			'CycleID' => 'Cycle',
			'CourseID' => 'Course',
			'LevelID' => 'Level',
			'WaitingID' => 'Waiting',
			'Transportation' => 'Transportation',
			'Withdrawl' => 'Dropped',
			'WithdrawlDate' => 'Dropping Date',
			'WithdrawlUpdate' => 'Dropped Update',
			'WithdrawlUpdatedBy' => 'Dropped Updated By',
                        'WithdrawReason' => 'Dropped Reason',
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
                $criteria->join = " left outer join tbl_student student on t.StudentID=student.StudentID LEFT OUTER JOIN tbl_cycle c ON t.CycleID = c.CycleID "
                               // . "LEFT OUTER JOIN tbl_subject subject ON t.SubjectID = subject.SubjectID "
                        ;
                $criteria->compare('student.FullName',$this->StudentID,true);
                //$criteria->compare('st.ArabicFullName',$this->student->ArabicFullName,true);
                $criteria->compare('c.CycleName',$this->CycleID,true);
		                        
		$criteria->compare('t.ProgramID',$this->ProgramID);
		$criteria->compare('t.EnrolmentID',$this->EnrolmentID);
		$criteria->compare('t.CourseID',$this->CourseID);
		$criteria->compare('t.LevelID',$this->LevelID);
		$criteria->compare('t.WaitingID',$this->WaitingID);
		$criteria->compare('t.Transportation',$this->Transportation);
		$criteria->compare('t.Withdrawl',$this->Withdrawl);
		$criteria->compare('t.WithdrawlDate',$this->WithdrawlDate,true);
		$criteria->compare('t.WithdrawlUpdate',$this->WithdrawlUpdate,true);
		$criteria->compare('t.WithdrawlUpdatedBy',$this->WithdrawlUpdatedBy);
                $criteria->compare('t.WithdrawReasonID',$this->WithdrawReasonID);
                $criteria->compare('t.Active',$this->Active);
		$criteria->compare('t.Created',$this->Created,true);
		$criteria->compare('t.CreatedBy',$this->CreatedBy);
		$criteria->compare('t.Updated',$this->Updated,true);
		$criteria->compare('t.UpdatedBy',$this->UpdatedBy);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CycleEnrolment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
