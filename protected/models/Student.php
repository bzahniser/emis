<?php

/**
 * This is the model class for table "tbl_student".
 *
 * The followings are the available columns in table 'tbl_student':
 * @property integer $ProgramID
 * @property integer $StudentID
 * @property string $Name
 * @property string $LastName
 * @property string $FullName
 * @property string $ArabicName
 * @property string $ArabicLastName
 * @property string $ArabicFullName
 * @property integer $DocumentTypeId
 * @property string $DocumentId
 * @property integer $RelationDID
 * @property integer $FatherIsAlive
 * @property integer $MotherIsAlive
 * @property integer $RegisteredinEducation
 * @property integer $LastGradeServed
 * @property integer $IsMale
 * @property string $BirthDate
 * @property integer $BirthCountryID
 * @property string $PhoneNumber
 * @property string $Whatsup
 * @property integer $MedicalStatusID
 * @property integer $HouseHeadRelationID
 * @property integer $NumberOfPersons
 * @property integer $CurrentCountryID
 * @property integer $CurrentCityID
 * @property integer $OriginalCountryID
 * @property integer $OriginalCityID
 * @property integer $BenefitFromIRC
 * @property integer $FamilyRelationID
 * @property integer $OutOfSchool
 * @property integer $BenfitIRCEdu
 * @property integer $MediaApproval
 * @property integer $RefrenceID
 * @property integer $RgistrationCountryID
 * @property integer $RegistrationCityID
 * @property integer $RegistrationEmpID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Attendance[] $attendances
 * @property CycleEnrolment[] $cycleEnrolments
 * @property Document[] $documents
 * @property Leave[] $leaves
 * @property City $currentCity
 * @property City $originalCity
 * @property City $registrationCity
 * @property Country $birthCountry
 * @property Country $currentCountry
 * @property Country $originalCountry
 * @property Country $rgistrationCountry
 * @property DocumentType $documentType
 * @property FamilyRelation $familyRelation
 * @property FamilyRelation $houseHeadRelation
 * @property Document $relationD
 * @property MedicalStatus $medicalStatus
 * @property Program $program
 * @property Reference $refrence
 * @property User $createdBy
 * @property User $registrationEmp
 * @property User $updatedBy
 * @property StudentExam[] $studentExams
 * @property Waiting[] $waitings
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, Name, LastName, FullName, ArabicName, ArabicLastName, ArabicFullName, IsMale, BirthDate, BirthCountryID, MedicalStatusID, CurrentCountryID, CurrentCityID, OriginalCountryID, OriginalCityID, BenefitFromIRC, BenfitIRCEdu, MediaApproval, RgistrationCountryID, RegistrationCityID, RegistrationEmpID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, DocumentTypeId, RelationDID, FatherIsAlive, MotherIsAlive, RegisteredinEducation, LastGradeServed, IsMale, BirthCountryID, MedicalStatusID, HouseHeadRelationID, NumberOfPersons, CurrentCountryID, CurrentCityID, OriginalCountryID, OriginalCityID, BenefitFromIRC, FamilyRelationID, OutOfSchool, BenfitIRCEdu, MediaApproval, RefrenceID, RgistrationCountryID, RegistrationCityID, RegistrationEmpID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('Name, LastName, ArabicName, ArabicLastName, DocumentId, PhoneNumber, Whatsup,OldID', 'length', 'max'=>25),
			array('FullName, ArabicFullName', 'length', 'max'=>51),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, StudentID, Name, LastName, FullName, ArabicName, ArabicLastName, ArabicFullName, DocumentTypeId, DocumentId, RelationDID, FatherIsAlive, MotherIsAlive, RegisteredinEducation, LastGradeServed, IsMale, BirthDate, BirthCountryID, PhoneNumber, Whatsup, MedicalStatusID, HouseHeadRelationID, NumberOfPersons, CurrentCountryID, CurrentCityID, OriginalCountryID, OriginalCityID, BenefitFromIRC, FamilyRelationID, OutOfSchool, BenfitIRCEdu, MediaApproval, RefrenceID, RgistrationCountryID, RegistrationCityID, RegistrationEmpID, Active, Created, CreatedBy, Updated, UpdatedBy,OldID', 'safe', 'on'=>'search'),
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
			'attendances' => array(self::HAS_MANY, 'Attendance', 'StudentID'),
			'cycleEnrolments' => array(self::HAS_MANY, 'CycleEnrolment', 'StudentID'),
			'documents' => array(self::HAS_MANY, 'Document', 'StudentID'),
			'leaves' => array(self::HAS_MANY, 'Leave', 'StudentID'),
			'currentCity' => array(self::BELONGS_TO, 'City', 'CurrentCityID'),
			'originalCity' => array(self::BELONGS_TO, 'City', 'OriginalCityID'),
			'registrationCity' => array(self::BELONGS_TO, 'City', 'RegistrationCityID'),
			'birthCountry' => array(self::BELONGS_TO, 'Country', 'BirthCountryID'),
			'currentCountry' => array(self::BELONGS_TO, 'Country', 'CurrentCountryID'),
			'originalCountry' => array(self::BELONGS_TO, 'Country', 'OriginalCountryID'),
			'rgistrationCountry' => array(self::BELONGS_TO, 'Country', 'RgistrationCountryID'),
			'documentType' => array(self::BELONGS_TO, 'DocumentType', 'DocumentTypeId'),
			'familyRelation' => array(self::BELONGS_TO, 'FamilyRelation', 'FamilyRelationID'),
			'houseHeadRelation' => array(self::BELONGS_TO, 'FamilyRelation', 'HouseHeadRelationID'),
			'relationDID' => array(self::BELONGS_TO, 'Document', 'RelationDID'),
			'medicalStatus' => array(self::BELONGS_TO, 'MedicalStatus', 'MedicalStatusID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'refrence' => array(self::BELONGS_TO, 'Reference', 'RefrenceID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'registrationEmp' => array(self::BELONGS_TO, 'User', 'RegistrationEmpID'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'StudentID'),
			'waitings' => array(self::HAS_MANY, 'Waiting', 'StudentID'),
                        'gender' => array(self::BELONGS_TO, 'Gender', 'IsMale'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'StudentID' => 'Student',
			'Name' => 'Name',
			'LastName' => 'Last Name',
			'FullName' => 'Full Name',
			'ArabicName' => 'Arabic Name',
			'ArabicLastName' => 'Arabic Last Name',
			'ArabicFullName' => 'Arabic Full Name',
			'DocumentTypeId' => 'Document Type',
			'DocumentId' => 'Document',
			'RelationDID' => 'Relation DID',
			'FatherIsAlive' => 'Father Is Alive',
			'MotherIsAlive' => 'Mother Is Alive',
			'RegisteredinEducation' => 'Registered In Education',
			'LastGradeServed' => 'Last Grade Served',
			'IsMale' => 'Gender',
			'BirthDate' => 'Birth Date',
			'BirthCountryID' => 'Birth Country',
			'PhoneNumber' => 'Phone Number',
			'Whatsup' => 'Whatsup',
			'MedicalStatusID' => 'Medical Status',
			'HouseHeadRelationID' => 'House Head Relation',
			'NumberOfPersons' => 'Number Of Persons',
			'CurrentCountryID' => 'Current Country',
			'CurrentCityID' => 'Current City',
			'OriginalCountryID' => 'Original Country',
			'OriginalCityID' => 'Original City',
			'BenefitFromIRC' => 'Benefit From IRC',
			'FamilyRelationID' => 'Family Relation',
			'OutOfSchool' => 'Duration Out Of School',
			'BenfitIRCEdu' => 'Benfit IRC Education',
			'MediaApproval' => 'Media Approval',
			'RefrenceID' => 'Refrence',
			'RgistrationCountryID' => 'Rgistration Country',
			'RegistrationCityID' => 'Registration City',
			'RegistrationEmpID' => 'Registration Emp',
			'Active' => 'Active',
			'Created' => 'Created',
			'CreatedBy' => 'Created By',
			'Updated' => 'Updated',
			'UpdatedBy' => 'Updated By',
                        'OldID'=>'Old ID',
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
		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('ArabicName',$this->ArabicName,true);
		$criteria->compare('ArabicLastName',$this->ArabicLastName,true);
		$criteria->compare('ArabicFullName',$this->ArabicFullName,true);
		$criteria->compare('DocumentTypeId',$this->DocumentTypeId);
		$criteria->compare('DocumentId',$this->DocumentId,true);
		$criteria->compare('RelationDID',$this->RelationDID);
		$criteria->compare('FatherIsAlive',$this->FatherIsAlive);
		$criteria->compare('MotherIsAlive',$this->MotherIsAlive);
		$criteria->compare('RegisteredinEducation',$this->RegisteredinEducation);
		$criteria->compare('LastGradeServed',$this->LastGradeServed);
		$criteria->compare('IsMale',$this->IsMale);
		$criteria->compare('BirthDate',$this->BirthDate,true);
		$criteria->compare('BirthCountryID',$this->BirthCountryID);
		$criteria->compare('PhoneNumber',$this->PhoneNumber,true);
		$criteria->compare('Whatsup',$this->Whatsup,true);
		$criteria->compare('MedicalStatusID',$this->MedicalStatusID);
		$criteria->compare('HouseHeadRelationID',$this->HouseHeadRelationID);
		$criteria->compare('NumberOfPersons',$this->NumberOfPersons);
		$criteria->compare('CurrentCountryID',$this->CurrentCountryID);
		$criteria->compare('CurrentCityID',$this->CurrentCityID);
		$criteria->compare('OriginalCountryID',$this->OriginalCountryID);
		$criteria->compare('OriginalCityID',$this->OriginalCityID);
		$criteria->compare('BenefitFromIRC',$this->BenefitFromIRC);
		$criteria->compare('FamilyRelationID',$this->FamilyRelationID);
		$criteria->compare('OutOfSchool',$this->OutOfSchool);
		$criteria->compare('BenfitIRCEdu',$this->BenfitIRCEdu);
		$criteria->compare('MediaApproval',$this->MediaApproval);
		$criteria->compare('RefrenceID',$this->RefrenceID);
		$criteria->compare('RgistrationCountryID',$this->RgistrationCountryID);
		$criteria->compare('RegistrationCityID',$this->RegistrationCityID);
		$criteria->compare('RegistrationEmpID',$this->RegistrationEmpID);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('CreatedBy',$this->CreatedBy);
		$criteria->compare('Updated',$this->Updated,true);
		$criteria->compare('UpdatedBy',$this->UpdatedBy);
                $criteria->compare('OldID',$this->OldID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
