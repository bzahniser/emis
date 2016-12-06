<?php

/**
 * This is the model class for table "tbl_exam".
 *
 * The followings are the available columns in table 'tbl_exam':
 * @property integer $ProgramID
 * @property integer $ExamID
 * @property string $ExamName
 * @property string $ExamScore
 * @property string $ExamPassingPercentage
 * @property integer $ExamCertification
 * @property integer $CoordinatorID
 * @property integer $SubjectID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property CycleExam[] $cycleExams
 * @property Coordinator $coordinator
 * @property Program $program
 * @property Subject $subject
 * @property User $createdBy
 * @property User $updatedBy
 * @property LevelExam[] $levelExams
 * @property StudentExam[] $studentExams
 */
class Exam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_exam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, ExamName, ExamScore, ExamPassingPercentage, ExamCertification, CoordinatorID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, ExamCertification, CoordinatorID, SubjectID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('ExamName', 'length', 'max'=>25),
			array('ExamScore, ExamPassingPercentage', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, ExamID, ExamName, ExamScore, ExamPassingPercentage, ExamCertification, CoordinatorID, SubjectID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'ExamID'),
			'coordinator' => array(self::BELONGS_TO, 'Coordinator', 'CoordinatorID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'SubjectID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'levelExams' => array(self::HAS_MANY, 'LevelExam', 'ExamID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'ExamID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'ExamID' => 'Exam',
			'ExamName' => 'Exam Name',
			'ExamScore' => 'Exam Score',
			'ExamPassingPercentage' => 'Exam Passing Percentage',
			'ExamCertification' => 'Exam Certification',
			'CoordinatorID' => 'Coordinator',
			'SubjectID' => 'Subject',
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
		$criteria->compare('ExamID',$this->ExamID);
		$criteria->compare('ExamName',$this->ExamName,true);
		$criteria->compare('ExamScore',$this->ExamScore,true);
		$criteria->compare('ExamPassingPercentage',$this->ExamPassingPercentage,true);
		$criteria->compare('ExamCertification',$this->ExamCertification);
		$criteria->compare('CoordinatorID',$this->CoordinatorID);
		$criteria->compare('SubjectID',$this->SubjectID);
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
	 * @return Exam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
