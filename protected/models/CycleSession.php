<?php

/**
 * This is the model class for table "tbl_cycle_session".
 *
 * The followings are the available columns in table 'tbl_cycle_session':
 * @property integer $ProgramID
 * @property integer $SessionID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $CycleID
 * @property integer $SubjectID
 * @property string $SessionDate
 * @property string $TimeFrom
 * @property string $TimeTo
 * @property integer $FacilitatorID
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
 * @property Facilitator $facilitator
 * @property Level $level
 * @property Program $program
 * @property Subject $subject
 * @property User $createdBy
 * @property User $updatedBy
 */
class CycleSession extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cycle_session';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CourseID, LevelID, CycleID, SessionDate, TimeFrom, TimeTo, FacilitatorID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, CourseID, LevelID, CycleID, SubjectID, FacilitatorID, Active, CreatedBy, UpdatedBy, SessionCanceld, SessionDeleted', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SessionCanceld, SessionDeleted, ProgramID, SessionID, CourseID, LevelID, CycleID, SubjectID, SessionDate, TimeFrom, TimeTo, FacilitatorID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'attendances' => array(self::HAS_MANY, 'Attendance', 'SessionID'),
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'cycle' => array(self::BELONGS_TO, 'Cycle', 'CycleID'),
			'facilitator' => array(self::BELONGS_TO, 'Facilitator', 'FacilitatorID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
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
                        'SessionCanceld'=>'Canceled',
                        'SessionDeleted'=>'Deleted',
			'ProgramID' => 'Program',
			'SessionID' => 'Session',
			'CourseID' => 'Course',
			'LevelID' => 'Level',
			'CycleID' => 'Cycle',
			'SubjectID' => 'Subject',
			'SessionDate' => 'Session Date',
			'TimeFrom' => 'Time From',
			'TimeTo' => 'Time To',
			'FacilitatorID' => 'Facilitator',
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

                $criteria->join = "LEFT OUTER JOIN tbl_course course ON t.CourseID = course.CourseID "
                                . "LEFT OUTER JOIN tbl_level level ON t.LevelID = level.LevelID "
                                . "LEFT OUTER JOIN tbl_cycle cycle ON t.CycleID = cycle.CycleID "
                               // . "LEFT OUTER JOIN tbl_subject subject ON t.SubjectID = subject.SubjectID "
                        ;
               
                $criteria->compare('course.CourseName',$this->CourseID,true);
		$criteria->compare('level.LevelName',$this->LevelID,true);
                $criteria->compare('cycle.CycleName',$this->CycleID,true);
                
		$criteria->compare('ProgramID',$this->ProgramID);
		$criteria->compare('SessionID',$this->SessionID);
		//$criteria->compare('CourseID',$this->CourseID);
		//$criteria->compare('LevelID',$this->LevelID);
		//$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('SubjectID',$this->SubjectID);
		$criteria->compare('SessionDate',$this->SessionDate,true);
		$criteria->compare('TimeFrom',$this->TimeFrom,true);
		$criteria->compare('TimeTo',$this->TimeTo,true);
		$criteria->compare('FacilitatorID',$this->FacilitatorID);
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
	 * @return CycleSession the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
