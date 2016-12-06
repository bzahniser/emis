<?php

/**
 * This is the model class for table "v_exam_score".
 *
 * The followings are the available columns in table 'v_exam_score':
 * @property integer $CycleExamID
 * @property string $ExamDate
 * @property string $ExamTime
 * @property string $TotalScore
 * @property string $PassingScore
 * @property integer $Pre
 * @property integer $Mid
 * @property integer $Post
 * @property integer $StudentID
 * @property string $FullName
 * @property integer $CycleID
 * @property string $CycleName
 * @property integer $SubjectID
 * @property string $SubjectName
 * @property integer $ExamID
 * @property string $ExamName
 */
class VExamScore extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_exam_score';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TotalScore, PassingScore, Pre, Mid, Post, FullName, CycleName, SubjectName, ExamName', 'required'),
			array('CycleExamID, Pre, Mid, Post, StudentID, CycleID, SubjectID, ExamID', 'numerical', 'integerOnly'=>true),
			array('TotalScore, PassingScore', 'length', 'max'=>10),
			array('FullName', 'length', 'max'=>51),
			array('CycleName, SubjectName, ExamName', 'length', 'max'=>25),
			array('ExamDate, ExamTime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CycleExamID, ExamDate, ExamTime, TotalScore, PassingScore, Pre, Mid, Post, StudentID, FullName, CycleID, CycleName, SubjectID, SubjectName, ExamID, ExamName', 'safe', 'on'=>'search'),
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
			'CycleExamID' => 'Cycle Exam',
			'ExamDate' => 'Exam Date',
			'ExamTime' => 'Exam Time',
			'TotalScore' => 'Total Score',
			'PassingScore' => 'Passing Score',
			'Pre' => 'Pre',
			'Mid' => 'Mid',
			'Post' => 'Post',
			'StudentID' => 'Student',
			'FullName' => 'Full Name',
			'CycleID' => 'Cycle',
			'CycleName' => 'Cycle Name',
			'SubjectID' => 'Subject',
			'SubjectName' => 'Subject Name',
			'ExamID' => 'Exam',
			'ExamName' => 'Exam Name',
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

		$criteria->compare('CycleExamID',$this->CycleExamID);
		$criteria->compare('ExamDate',$this->ExamDate,true);
		$criteria->compare('ExamTime',$this->ExamTime,true);
		$criteria->compare('TotalScore',$this->TotalScore,true);
		$criteria->compare('PassingScore',$this->PassingScore,true);
		$criteria->compare('Pre',$this->Pre);
		$criteria->compare('Mid',$this->Mid);
		$criteria->compare('Post',$this->Post);
		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('CycleName',$this->CycleName,true);
		$criteria->compare('SubjectID',$this->SubjectID);
		$criteria->compare('SubjectName',$this->SubjectName,true);
		$criteria->compare('ExamID',$this->ExamID);
		$criteria->compare('ExamName',$this->ExamName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VExamScore the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
