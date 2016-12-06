<?php

/**
 * This is the model class for table "tbl_cycle_subject".
 *
 * The followings are the available columns in table 'tbl_cycle_subject':
 * @property integer $ProgramID
 * @property integer $ID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $CycleID
 * @property integer $SubjectID
 * @property integer $LevelSubjectID
 * @property integer $FacilitatorID
 * @property integer $AttendancePerSubject
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Cycle $cycle
 * @property Facilitator $facilitator
 * @property Level $level
 * @property LevelSubject $levelSubject
 * @property Program $program
 * @property Subject $subject
 * @property User $createdBy
 * @property User $updatedBy
 */
class CycleSubject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cycle_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CourseID, LevelID, CycleID, SubjectID, AttendancePerSubject, Active, FacilitatorID, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, CourseID, LevelID, CycleID, SubjectID, LevelSubjectID, FacilitatorID, AttendancePerSubject, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, ID, CourseID, LevelID, CycleID, SubjectID, LevelSubjectID, FacilitatorID, AttendancePerSubject, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'facilitator' => array(self::BELONGS_TO, 'Facilitator', 'FacilitatorID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'levelSubject' => array(self::BELONGS_TO, 'LevelSubject', 'LevelSubjectID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'SubjectID'),
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
			'ID' => 'ID',
			'CourseID' => 'Course',
			'LevelID' => 'Level',
			'CycleID' => 'Cycle',
			'SubjectID' => 'Subject',
			'LevelSubjectID' => 'Level Subject',
			'FacilitatorID' => 'Facilitator',
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
		$criteria->compare('ID',$this->ID);
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('LevelID',$this->LevelID);
		$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('SubjectID',$this->SubjectID);
		$criteria->compare('LevelSubjectID',$this->LevelSubjectID);
		$criteria->compare('FacilitatorID',$this->FacilitatorID);
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
	 * @return CycleSubject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
