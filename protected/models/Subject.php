<?php

/**
 * This is the model class for table "tbl_subject".
 *
 * The followings are the available columns in table 'tbl_subject':
 * @property integer $SubjectID
 * @property string $SubjectName
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property CycleExam[] $cycleExams
 * @property CycleSubject[] $cycleSubjects
 * @property Exam[] $exams
 * @property LevelExam[] $levelExams
 * @property LevelSubject[] $levelSubjects
 * @property StudentExam[] $studentExams
 * @property User $createdBy
 * @property User $updatedBy
 */
class Subject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SubjectName, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('SubjectName', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('SubjectID, SubjectName, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'cycleExams' => array(self::HAS_MANY, 'CycleExam', 'SubjectID'),
			'cycleSubjects' => array(self::HAS_MANY, 'CycleSubject', 'SubjectID'),
			'exams' => array(self::HAS_MANY, 'Exam', 'SubjectID'),
			'levelExams' => array(self::HAS_MANY, 'LevelExam', 'SubjectID'),
			'levelSubjects' => array(self::HAS_MANY, 'LevelSubject', 'SubjectID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'SubjectID'),
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
			'SubjectID' => 'Subject',
			'SubjectName' => 'Subject Name',
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

		$criteria->compare('SubjectID',$this->SubjectID);
		$criteria->compare('SubjectName',$this->SubjectName,true);
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
	 * @return Subject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
