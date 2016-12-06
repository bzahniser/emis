<?php

/**
 * This is the model class for table "v_attendancegeneration".
 *
 * The followings are the available columns in table 'v_attendancegeneration':
 * @property string $ID
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
 * @property string $SessionDate
 * @property integer $EnrolmentID
 * @property string $FullName
 * @property string $ArabicFullName
 * @property string $CycleName
 */
class VAttendancegeneration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_attendancegeneration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, FacilitatorID, CycleID, CourseID, LevelID, SessionDate', 'required'),
			array('ProgramID, AttendanceID, StudentID, FacilitatorID, CycleID, CourseID, LevelID, Present, Absent, SessionID, EnrolmentID', 'numerical', 'integerOnly'=>true),
			array('ID', 'length', 'max'=>36),
			array('FullName, ArabicFullName', 'length', 'max'=>51),
			array('CycleName', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, ProgramID, AttendanceID, StudentID, FacilitatorID, CycleID, CourseID, LevelID, Present, Absent, SessionID, SessionDate, EnrolmentID, FullName, ArabicFullName, CycleName', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
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
			'SessionDate' => 'Session Date',
			'EnrolmentID' => 'Enrolment',
			'FullName' => 'Full Name',
			'ArabicFullName' => 'Arabic Full Name',
			'CycleName' => 'Cycle Name',
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

		$criteria->compare('ID',$this->ID,true);
		$criteria->compare('ProgramID',$this->ProgramID);
		$criteria->compare('AttendanceID',$this->AttendanceID);
		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('FacilitatorID',$this->FacilitatorID);
		$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('LevelID',$this->LevelID);
		$criteria->compare('Present',$this->Present);
		$criteria->compare('Absent',$this->Absent);
		$criteria->compare('SessionID',$this->SessionID);
		$criteria->compare('SessionDate',$this->SessionDate,true);
		$criteria->compare('EnrolmentID',$this->EnrolmentID);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('ArabicFullName',$this->ArabicFullName,true);
		$criteria->compare('CycleName',$this->CycleName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VAttendancegeneration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
