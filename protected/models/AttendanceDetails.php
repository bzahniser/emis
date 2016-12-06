<?php

/**
 * This is the model class for table "v_attendance_details".
 *
 * The followings are the available columns in table 'v_attendance_details':
 * @property integer $ProgramID
 * @property integer $CourseID
 * @property string $CourseName
 * @property integer $GroupID
 * @property string $GroupName
 * @property integer $CourseTypeID
 * @property string $CourseTypeName
 * @property integer $LevelID
 * @property string $LevelName
 * @property integer $CycleID
 * @property string $CycleName
 * @property string $StartDate
 * @property integer $SessionID
 * @property integer $EnrolmentID
 * @property integer $withdrawl
 * @property string $WithdrawlDate
 * @property string $SessionDate
 * @property string $TimeFrom
 * @property string $TimeTo
 * @property integer $FacilitatorID
 * @property integer $AttendanceID
 * @property integer $StudentID
 * @property string $FullName
 * @property string $ArabicFullName
 * @property string $DocumentID
 * @property integer $GenderID
 * @property string $GenderName
 * @property integer $RangeID
 * @property string $RangeName
 * @property string $Vacation
 * @property integer $SessionCanceld
 * @property integer $SessionDeleted
 * @property integer $Absent
 * @property integer $Present
 * @property string $Leav
 * @property integer $LeaveReasonID
 * @property string $ReasonName
 */
class AttendanceDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_attendance_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CourseID, LevelID, CycleID, SessionDate, TimeFrom, TimeTo, FacilitatorID', 'required'),
			array('ProgramID, CourseID, GroupID, CourseTypeID, LevelID, CycleID, SessionID, EnrolmentID, withdrawl, FacilitatorID, AttendanceID, StudentID, GenderID, RangeID, SessionCanceld, SessionDeleted, Absent, Present, LeaveReasonID', 'numerical', 'integerOnly'=>true),
			array('CourseName, GroupName, CourseTypeName, LevelName, CycleName, DocumentID, GenderName, RangeName, ReasonName', 'length', 'max'=>25),
			array('FullName, ArabicFullName', 'length', 'max'=>51),
			array('Vacation, Leav', 'length', 'max'=>11),
			array('StartDate, WithdrawlDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, CourseID, CourseName, GroupID, GroupName, CourseTypeID, CourseTypeName, LevelID, LevelName, CycleID, CycleName, StartDate, SessionID, EnrolmentID, withdrawl, WithdrawlDate, SessionDate, TimeFrom, TimeTo, FacilitatorID, AttendanceID, StudentID, FullName, ArabicFullName, DocumentID, GenderID, GenderName, RangeID, RangeName, Vacation, SessionCanceld, SessionDeleted, Absent, Present, Leav, LeaveReasonID, ReasonName', 'safe', 'on'=>'search'),
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
			'CourseName' => 'Course Name',
			'GroupID' => 'Group',
			'GroupName' => 'Group Name',
			'CourseTypeID' => 'Course Type',
			'CourseTypeName' => 'Course Type Name',
			'LevelID' => 'Level',
			'LevelName' => 'Level Name',
			'CycleID' => 'Cycle',
			'CycleName' => 'Cycle Name',
			'StartDate' => 'Start Date',
			'SessionID' => 'Session',
			'EnrolmentID' => 'Enrolment',
			'withdrawl' => 'Withdrawl',
			'WithdrawlDate' => 'Withdrawl Date',
			'SessionDate' => 'Session Date',
			'TimeFrom' => 'Time From',
			'TimeTo' => 'Time To',
			'FacilitatorID' => 'Facilitator',
			'AttendanceID' => 'Attendance',
			'StudentID' => 'Student',
			'FullName' => 'Full Name',
			'ArabicFullName' => 'Arabic Full Name',
			'DocumentID' => 'Document',
			'GenderID' => 'Gender',
			'GenderName' => 'Gender Name',
			'RangeID' => 'Range',
			'RangeName' => 'Range Name',
			'Vacation' => 'Vacation',
			'SessionCanceld' => 'Session Canceld',
			'SessionDeleted' => 'Session Deleted',
			'Absent' => 'Absent',
			'Present' => 'Present',
			'Leav' => 'Leav',
			'LeaveReasonID' => 'Leave Reason',
			'ReasonName' => 'Reason Name',
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
		$criteria->compare('CourseName',$this->CourseName,true);
		$criteria->compare('GroupID',$this->GroupID);
		$criteria->compare('GroupName',$this->GroupName,true);
		$criteria->compare('CourseTypeID',$this->CourseTypeID);
		$criteria->compare('CourseTypeName',$this->CourseTypeName,true);
		$criteria->compare('LevelID',$this->LevelID);
		$criteria->compare('LevelName',$this->LevelName,true);
		$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('CycleName',$this->CycleName,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('SessionID',$this->SessionID);
		$criteria->compare('EnrolmentID',$this->EnrolmentID);
		$criteria->compare('withdrawl',$this->withdrawl);
		$criteria->compare('WithdrawlDate',$this->WithdrawlDate,true);
		$criteria->compare('SessionDate',$this->SessionDate,true);
		$criteria->compare('TimeFrom',$this->TimeFrom,true);
		$criteria->compare('TimeTo',$this->TimeTo,true);
		$criteria->compare('FacilitatorID',$this->FacilitatorID);
		$criteria->compare('AttendanceID',$this->AttendanceID);
		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('ArabicFullName',$this->ArabicFullName,true);
		$criteria->compare('DocumentID',$this->DocumentID,true);
		$criteria->compare('GenderID',$this->GenderID);
		$criteria->compare('GenderName',$this->GenderName,true);
		$criteria->compare('RangeID',$this->RangeID);
		$criteria->compare('RangeName',$this->RangeName,true);
		$criteria->compare('Vacation',$this->Vacation,true);
		$criteria->compare('SessionCanceld',$this->SessionCanceld);
		$criteria->compare('SessionDeleted',$this->SessionDeleted);
		$criteria->compare('Absent',$this->Absent);
		$criteria->compare('Present',$this->Present);
		$criteria->compare('Leav',$this->Leav,true);
		$criteria->compare('LeaveReasonID',$this->LeaveReasonID);
		$criteria->compare('ReasonName',$this->ReasonName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AttendanceDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
