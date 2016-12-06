<?php

/**
 * This is the model class for table "tbl_cycle_exam".
 *
 * The followings are the available columns in table 'tbl_cycle_exam':
 * @property integer $ProgramID
 * @property integer $ID
 * @property integer $CourseID
 * @property integer $LevelID
 * @property integer $SubjectID
 * @property integer $CycleID
 * @property integer $ExamID
 * @property integer $Pre
 * @property integer $Post
 * @property integer $Mid
 * @property string $Score
 * @property string $PassingScore
 * @property integer $PassingRequired
 * @property integer $LevelExamID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Cycle $cycle
 * @property Exam $exam
 * @property LevelExam $levelExam
 * @property Level $level
 * @property Program $program
 * @property Subject $subject
 * @property User $createdBy
 * @property User $updatedBy
 * @property StudentExam[] $studentExams
 */
class CycleExam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cycle_exam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CourseID, LevelID, CycleID, ExamID, Pre, Post, Mid, Score, PassingRequired, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, CourseID, LevelID, SubjectID, CycleID, ExamID, Pre, Post, Mid, PassingRequired, LevelExamID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('Score, PassingScore', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, ID, CourseID, LevelID, SubjectID, CycleID, ExamID, Pre, Post, Mid, Score, PassingScore, PassingRequired, LevelExamID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'exam' => array(self::BELONGS_TO, 'Exam', 'ExamID'),
			'levelExam' => array(self::BELONGS_TO, 'LevelExam', 'LevelExamID'),
			'level' => array(self::BELONGS_TO, 'Level', 'LevelID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'SubjectID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'CycleExamID'),
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
			'CycleID' => 'Cycle',
			'ExamID' => 'Exam',
			'Pre' => 'Pre',
			'Post' => 'Post',
			'Mid' => 'Mid',
			'Score' => 'Score',
			'PassingScore' => 'Passing Score',
			'PassingRequired' => 'Passing Required',
			'LevelExamID' => 'Level Exam',
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
                
                $criteria->compare('SubjectID',$this->SubjectID);
		$criteria->compare('ProgramID',$this->ProgramID);
		$criteria->compare('ID',$this->ID);
		
		
		
		$criteria->compare('ExamID',$this->ExamID);
		$criteria->compare('Pre',$this->Pre);
		$criteria->compare('Post',$this->Post);
		$criteria->compare('Mid',$this->Mid);
		$criteria->compare('Score',$this->Score,true);
		$criteria->compare('PassingScore',$this->PassingScore,true);
		$criteria->compare('PassingRequired',$this->PassingRequired);
		$criteria->compare('LevelExamID',$this->LevelExamID);
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
	 * @return CycleExam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
