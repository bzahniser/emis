<?php

/**
 * This is the model class for table "tbl_document".
 *
 * The followings are the available columns in table 'tbl_document':
 * @property integer $ProgramID
 * @property integer $DID
 * @property integer $DocumentTypeID
 * @property string $DocumentID
 * @property integer $RelationID
 * @property integer $StudentID
 * @property string $FatherName
 * @property string $MotherFullName
 * @property string $ParentPhone
 * @property string $RelativeName
 * @property string $RelativePhone
 * @property string $ParentPhone2
 * @property string $Phone
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property DocumentType $documentType
 * @property Program $program
 * @property FamilyRelation $relation
 * @property Student $student
 * @property User $createdBy
 * @property User $updatedBy
 * @property Student[] $students
 */
class Document extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, FatherName, MotherFullName', 'required'),
			array('ProgramID, DocumentTypeID, RelationID, StudentID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('DocumentID, ParentPhone, RelativePhone, ParentPhone2, Phone', 'length', 'max'=>25),
			array('FatherName, MotherFullName, RelativeName', 'length', 'max'=>51),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, DID, DocumentTypeID, DocumentID, RelationID, StudentID, FatherName, MotherFullName, ParentPhone, RelativeName, RelativePhone, ParentPhone2, Phone, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'documentType' => array(self::BELONGS_TO, 'DocumentType', 'DocumentTypeID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'relation' => array(self::BELONGS_TO, 'FamilyRelation', 'RelationID'),
			'student' => array(self::BELONGS_TO, 'Student', 'StudentID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'students' => array(self::HAS_MANY, 'Student', 'RelationDID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'DID' => 'Did',
			'DocumentTypeID' => 'Document Type',
			'DocumentID' => 'Document',
			'RelationID' => 'Relation',
			'StudentID' => 'Student',
			'FatherName' => 'Father Name',
			'MotherFullName' => 'Mother Full Name',
			'ParentPhone' => 'Parent Phone',
			'RelativeName' => 'Relative Name',
			'RelativePhone' => 'Relative Phone',
			'ParentPhone2' => 'Parent Phone2',
			'Phone' => 'Phone',
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
		$criteria->compare('DID',$this->DID);
		$criteria->compare('DocumentTypeID',$this->DocumentTypeID);
		$criteria->compare('DocumentID',$this->DocumentID,true);
		$criteria->compare('RelationID',$this->RelationID);
		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('FatherName',$this->FatherName,true);
		$criteria->compare('MotherFullName',$this->MotherFullName,true);
		$criteria->compare('ParentPhone',$this->ParentPhone,true);
		$criteria->compare('RelativeName',$this->RelativeName,true);
		$criteria->compare('RelativePhone',$this->RelativePhone,true);
		$criteria->compare('ParentPhone2',$this->ParentPhone2,true);
		$criteria->compare('Phone',$this->Phone,true);
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
	 * @return Document the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
