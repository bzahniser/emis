<?php

/**
 * This is the model class for table "tbl_leave".
 *
 * The followings are the available columns in table 'tbl_leave':
 * @property integer $ProgramID
 * @property integer $LeaveID
 * @property string $LeaveName
 * @property string $LeaveDateFrom
 * @property string $LeaveDateTo
 * @property integer $ReasonID
 * @property integer $EnrolmentID
 * @property integer $StudentID
 * @property integer $CycleID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Cycle $cycle
 * @property CycleEnrolment $enrolment
 * @property Leavereason $reason
 * @property Program $program
 * @property Student $student
 * @property User $createdBy
 * @property User $updatedBy
 */
class Leave extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_leave';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, LeaveDateTo, LeaveDateFrom, ReasonID, StudentID', 'required'),
			array('ProgramID, ReasonID, EnrolmentID, StudentID, LevelID, CourseID, CycleID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('LeaveName', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, LeaveID, LeaveName, LeaveDateFrom, LeaveDateTo, ReasonID, EnrolmentID, StudentID, CycleID, LevelID, CourseID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'cycle' => array(self::BELONGS_TO, 'Cycle', 'CycleID'),
                        'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
                        'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'enrolment' => array(self::BELONGS_TO, 'CycleEnrolment', 'EnrolmentID'),
			'reason' => array(self::BELONGS_TO, 'Leavereason', 'ReasonID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'student' => array(self::BELONGS_TO, 'Student', 'StudentID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'LeaveID' => 'Leave',
			'LeaveName' => 'Leave Name',
			'LeaveDateFrom' => 'Leave Date From',
                        'LeaveDateTo' => 'Leave Date To',
			'ReasonID' => 'Reason',
			'EnrolmentID' => 'Enrolment',
			'StudentID' => 'Student',
			'CycleID' => 'Cycle',
                        'LevelID' => 'Level',
                        'CourseID' => 'Course',
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
               
                $criteria->join = "LEFT OUTER JOIN tbl_cycle cycle ON t.CycleID = cycle.CycleID "
                                . "LEFT OUTER JOIN tbl_level level ON t.levelID = level.LevelID "
                        ;
                $criteria->compare('student.FullName',$this->StudentID,true);
                $criteria->compare('cycle.CycleName',$this->CycleID,true);
                $criteria->compare('level.LevelName',$this->LevelID,true);
                
		$criteria->compare('t.ProgramID',$this->ProgramID);
		$criteria->compare('t.LeaveID',$this->LeaveID);
		$criteria->compare('t.LeaveName',$this->LeaveName,true);
		$criteria->compare('t.LeaveDateFrom',$this->LeaveDateFrom,true);
                $criteria->compare('t.LeaveDateTo',$this->LeaveDateTo,true);
		$criteria->compare('ReasonID',$this->ReasonID);
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
	 * @return Leave the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
