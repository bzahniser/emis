<?php

/**
 * This is the model class for table "tbl_level_exam".
 *
 * The followings are the available columns in table 'tbl_level_exam':
 * @property integer $ProgramID
 * @property integer $ID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $SubjectID
 * @property integer $ExamID
 * @property integer $Pre
 * @property integer $Post
 * @property integer $Mid
 * @property string $Score
 * @property string $PassingPercentage
 * @property integer $PassingRequired
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property CycleExam[] $cycleExams
 * @property Course $course
 * @property Exam $exam
 * @property Level $level
 * @property Program $program
 * @property Subject $subject
 * @property User $createdBy
 * @property User $updatedBy
 * @property StudentExam[] $studentExams
 */
class LevelExam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_level_exam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CourseID, LevelID, ExamID, Pre, Post, Mid, Score, PassingRequired, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, CourseID, LevelID, SubjectID, ExamID, Pre, Post, Mid, PassingRequired, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('Score, PassingPercentage', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, ID, CourseID, LevelID, SubjectID, ExamID, Pre, Post, Mid, Score, PassingPercentage, PassingRequired, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'LevelExamID'),
			'course' => array(self::BELONGS_TO, 'Course', 'CourseID'),
			'exam' => array(self::BELONGS_TO, 'Exam', 'ExamID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'SubjectID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'LevelExamID'),
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
			'SubjectID' => 'Subject',
			'ExamID' => 'Exam',
			'Pre' => 'Pre',
			'Post' => 'Post',
			'Mid' => 'Mid',
			'Score' => 'Score',
			'PassingPercentage' => 'Passing Percentage',
			'PassingRequired' => 'Passing Required',
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
		$criteria->compare('SubjectID',$this->SubjectID);
		$criteria->compare('ExamID',$this->ExamID);
		$criteria->compare('Pre',$this->Pre);
		$criteria->compare('Post',$this->Post);
		$criteria->compare('Mid',$this->Mid);
		$criteria->compare('Score',$this->Score,true);
		$criteria->compare('PassingPercentage',$this->PassingPercentage,true);
		$criteria->compare('PassingRequired',$this->PassingRequired);
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
	 * @return LevelExam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
