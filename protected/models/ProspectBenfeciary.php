<?php

/**
 * This is the model class for table "tbl_prospectbenfeciary".
 *
 * The followings are the available columns in table 'tbl_prospectbenfeciary':
 * @property integer $ID
 * @property string $Name
 * @property string $LastName
 * @property string $FullName
 * @property string $ArabicName
 * @property string $ArabicLastName
 * @property string $ArabicFullName
 * @property integer $DocumentTypeId
 * @property string $DocumentId
 * @property integer $Gender
 * @property string $BirthDate
 * @property string $PhoneNumber
 * @property string $Whatsup
 * @property integer $SatutsID
 * @property string $FatherName
 * @property integer $CurrentCountryID
 * @property integer $CurrentCityID
 * @property integer $OriginalCountryID
 * @property integer $OriginalCityID
 * @property integer $VisitReasonID
 * @property integer $ActionID
 * @property string $Desc
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property City $currentCity
 * @property City $originalCity
 * @property Country $currentCountry
 * @property Country $originalCountry
 * @property DocumentType $documentType
 * @property Prostatus $satuts
 * @property Recpaction $action
 * @property User $createdBy
 * @property User $updatedBy
 * @property Visitreason $visitReason
 */
class Prospectbenfeciary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_prospectbenfeciary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, LastName, FullName, ArabicName, ArabicLastName, ArabicFullName, VisitReasonID, ActionID, Desc, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('DocumentTypeId, Gender, SatutsID, CurrentCountryID, CurrentCityID, OriginalCountryID, OriginalCityID, VisitReasonID, ActionID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('Name, LastName, ArabicName, ArabicLastName, DocumentId, PhoneNumber, Whatsup, FatherName', 'length', 'max'=>25),
			array('FullName, ArabicFullName', 'length', 'max'=>51),
			array('Desc', 'length', 'max'=>200),
			array('BirthDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, Name, LastName, FullName, ArabicName, ArabicLastName, ArabicFullName, DocumentTypeId, DocumentId, Gender, BirthDate, PhoneNumber, Whatsup, SatutsID, FatherName, CurrentCountryID, CurrentCityID, OriginalCountryID, OriginalCityID, VisitReasonID, ActionID, Desc, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'currentCity' => array(self::BELONGS_TO, 'City', 'CurrentCityID'),
			'originalCity' => array(self::BELONGS_TO, 'City', 'OriginalCityID'),
			'currentCountry' => array(self::BELONGS_TO, 'Country', 'CurrentCountryID'),
			'originalCountry' => array(self::BELONGS_TO, 'Country', 'OriginalCountryID'),
			'documentType' => array(self::BELONGS_TO, 'DocumentType', 'DocumentTypeId'),
			'satuts' => array(self::BELONGS_TO, 'Prostatus', 'SatutsID'),
			'action' => array(self::BELONGS_TO, 'Recpaction', 'ActionID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'visitReason' => array(self::BELONGS_TO, 'Visitreason', 'VisitReasonID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Name' => 'Name',
			'LastName' => 'Last Name',
			'FullName' => 'Full Name',
			'ArabicName' => 'Arabic Name',
			'ArabicLastName' => 'Arabic Last Name',
			'ArabicFullName' => 'Arabic Full Name',
			'DocumentTypeId' => 'Document Type',
			'DocumentId' => 'Document',
			'Gender' => 'Gender',
			'BirthDate' => 'Birth Date',
			'PhoneNumber' => 'Phone Number',
			'Whatsup' => 'Whatsup',
			'SatutsID' => 'Satuts',
			'FatherName' => 'Father Name',
			'CurrentCountryID' => 'Current Country',
			'CurrentCityID' => 'Current City',
			'OriginalCountryID' => 'Original Country',
			'OriginalCityID' => 'Original City',
			'VisitReasonID' => 'Visit Reason',
			'ActionID' => 'Action',
			'Desc' => 'Desc',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('ArabicName',$this->ArabicName,true);
		$criteria->compare('ArabicLastName',$this->ArabicLastName,true);
		$criteria->compare('ArabicFullName',$this->ArabicFullName,true);
		$criteria->compare('DocumentTypeId',$this->DocumentTypeId);
		$criteria->compare('DocumentId',$this->DocumentId,true);
		$criteria->compare('Gender',$this->Gender);
		$criteria->compare('BirthDate',$this->BirthDate,true);
		$criteria->compare('PhoneNumber',$this->PhoneNumber,true);
		$criteria->compare('Whatsup',$this->Whatsup,true);
		$criteria->compare('SatutsID',$this->SatutsID);
		$criteria->compare('FatherName',$this->FatherName,true);
		$criteria->compare('CurrentCountryID',$this->CurrentCountryID);
		$criteria->compare('CurrentCityID',$this->CurrentCityID);
		$criteria->compare('OriginalCountryID',$this->OriginalCountryID);
		$criteria->compare('OriginalCityID',$this->OriginalCityID);
		$criteria->compare('VisitReasonID',$this->VisitReasonID);
		$criteria->compare('ActionID',$this->ActionID);
		$criteria->compare('Desc',$this->Desc,true);
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
	 * @return Prospectbenfeciary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
