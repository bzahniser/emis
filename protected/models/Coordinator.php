<?php

/**
 * This is the model class for table "tbl_coordinator".
 *
 * The followings are the available columns in table 'tbl_coordinator':
 * @property integer $ProgramID
 * @property integer $CoordinatorID
 * @property string $CoordinatorName
 * @property string $CoordinatorLastName
 * @property string $CoordinatorFullName
 * @property integer $DocumentTypeID
 * @property string $DocumentID
 * @property integer $GroupID
 * @property string $PhoneNumber
 * @property string $Whatsup
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Center[] $centers
 * @property CoordinatorGroup $group
 * @property DocumentType $documentType
 * @property Program $program
 * @property User $createdBy
 * @property User $updatedBy
 * @property Course[] $courses
 * @property Cycle[] $cycles
 * @property Exam[] $exams
 * @property Level[] $levels
 */
class Coordinator extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_coordinator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CoordinatorName, CoordinatorLastName, CoordinatorFullName, DocumentTypeID, DocumentID, GroupID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, DocumentTypeID, GroupID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('CoordinatorName, CoordinatorLastName, DocumentID, PhoneNumber, Whatsup', 'length', 'max'=>25),
			array('CoordinatorFullName', 'length', 'max'=>51),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, CoordinatorID, CoordinatorName, CoordinatorLastName, CoordinatorFullName, DocumentTypeID, DocumentID, GroupID, PhoneNumber, Whatsup, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'centers' => array(self::HAS_MANY, 'Center', 'CoordinatorID'),
			'group' => array(self::BELONGS_TO, 'CoordinatorGroup', 'GroupID'),
			'documentType' => array(self::BELONGS_TO, 'DocumentType', 'DocumentTypeID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'courses' => array(self::HAS_MANY, 'Course', 'CoordinatorID'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'CoordinatorID'),
			'exams' => array(self::HAS_MANY, 'Exam', 'CoordinatorID'),
			'levels' => array(self::HAS_MANY, 'Level', 'CoordinatorID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'CoordinatorID' => 'Coordinator',
			'CoordinatorName' => 'Coordinator Name',
			'CoordinatorLastName' => 'Coordinator Last Name',
			'CoordinatorFullName' => 'Coordinator Full Name',
			'DocumentTypeID' => 'Document Type',
			'DocumentID' => 'Document',
			'GroupID' => 'Group',
			'PhoneNumber' => 'Phone Number',
			'Whatsup' => 'Whatsup',
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
		$criteria->compare('CoordinatorID',$this->CoordinatorID);
		$criteria->compare('CoordinatorName',$this->CoordinatorName,true);
		$criteria->compare('CoordinatorLastName',$this->CoordinatorLastName,true);
		$criteria->compare('CoordinatorFullName',$this->CoordinatorFullName,true);
		$criteria->compare('DocumentTypeID',$this->DocumentTypeID);
		$criteria->compare('DocumentID',$this->DocumentID,true);
		$criteria->compare('GroupID',$this->GroupID);
		$criteria->compare('PhoneNumber',$this->PhoneNumber,true);
		$criteria->compare('Whatsup',$this->Whatsup,true);
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
	 * @return Coordinator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
