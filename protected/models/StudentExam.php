<?php

/**
 * This is the model class for table "tbl_student_exam".
 *
 * The followings are the available columns in table 'tbl_student_exam':
 * @property integer $ProgramID
 * @property integer $ID
 * @property integer $StudentID
 * @property integer $EnrolmentID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $CycleID
 * @property integer $SubjectID
 * @property integer $ExamID
 * @property integer $LevelExamID
 * @property integer $CycleExamID
 * @property string $StudentScore
 * @property string $ExamDate
 * @property string $ExamTime
 * @property integer $CountryID
 * @property integer $CityID
 * @property integer $CenterID
 * @property string $TotalScore
 * @property string $PassingScore
 * @property integer $Pre
 * @property integer $Post
 * @property integer $Mid
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Center $center
 * @property City $city
 * @property Country $country
 * @property Course $course
 * @property Cycle $cycle
 * @property CycleEnrolment $enrolment
 * @property CycleExam $cycleExam
 * @property Exam $exam
 * @property LevelExam $levelExam
 * @property Level $level
 * @property Program $program
 * @property Student $student
 * @property Subject $subject
 * @property User $createdBy
 * @property User $updatedBy
 */
class StudentExam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_student_exam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, StudentID, ExamID, StudentScore, ExamDate, ExamTime, CountryID, CityID, CenterID, TotalScore, PassingScore, Pre, Post, Mid, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, StudentID, EnrolmentID, CourseID, LevelID, CycleID, SubjectID, ExamID, LevelExamID, CycleExamID, CountryID, CityID, CenterID, Pre, Post, Mid, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('StudentScore, TotalScore, PassingScore', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, ID, StudentID, EnrolmentID, CourseID, LevelID, CycleID, SubjectID, ExamID, LevelExamID, CycleExamID, StudentScore, ExamDate, ExamTime, CountryID, CityID, CenterID, TotalScore, PassingScore, Pre, Post, Mid, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'center' => array(self::BELONGS_TO, 'Center', 'CenterID'),
			'city' => array(self::BELONGS_TO, 'City', 'CityID'),
			'country' => array(self::BELONGS_TO, 'Country', 'CountryID'),
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'cycle' => array(self::BELONGS_TO, 'Cycle', 'CycleID'),
			'enrolment' => array(self::BELONGS_TO, 'CycleEnrolment', 'EnrolmentID'),
			'cycleExam' => array(self::BELONGS_TO, 'CycleExam', 'CycleExamID'),
			'exam' => array(self::BELONGS_TO, 'Exam', 'ExamID'),
			'levelExam' => array(self::BELONGS_TO, 'LevelExam', 'LevelExamID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'student' => array(self::BELONGS_TO, 'Student', 'StudentID'),
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
			'StudentID' => 'Student',
			'EnrolmentID' => 'Enrolment',
			'CourseID' => 'Course',
			'LevelID' => 'Level',
			'CycleID' => 'Cycle',
			'SubjectID' => 'Subject',
			'ExamID' => 'Exam',
			'LevelExamID' => 'Level Exam',
			'CycleExamID' => 'Cycle Exam',
			'StudentScore' => 'Student Score',
			'ExamDate' => 'Exam Date',
			'ExamTime' => 'Exam Time',
			'CountryID' => 'Country',
			'CityID' => 'City',
			'CenterID' => 'Center',
			'TotalScore' => 'Total Score',
			'PassingScore' => 'Passing Score',
			'Pre' => 'Pre',
			'Post' => 'Post',
			'Mid' => 'Mid',
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
		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('EnrolmentID',$this->EnrolmentID);
		$criteria->compare('CourseID',$this->CourseID);
		$criteria->compare('LevelID',$this->LevelID);
		$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('SubjectID',$this->SubjectID);
		$criteria->compare('ExamID',$this->ExamID);
		$criteria->compare('LevelExamID',$this->LevelExamID);
		$criteria->compare('CycleExamID',$this->CycleExamID);
		$criteria->compare('StudentScore',$this->StudentScore,true);
		$criteria->compare('ExamDate',$this->ExamDate,true);
		$criteria->compare('ExamTime',$this->ExamTime,true);
		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('CenterID',$this->CenterID);
		$criteria->compare('TotalScore',$this->TotalScore,true);
		$criteria->compare('PassingScore',$this->PassingScore,true);
		$criteria->compare('Pre',$this->Pre);
		$criteria->compare('Post',$this->Post);
		$criteria->compare('Mid',$this->Mid);
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
	 * @return StudentExam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
