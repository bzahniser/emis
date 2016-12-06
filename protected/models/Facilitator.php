<?php

/**
 * This is the model class for table "tbl_facilitator".
 *
 * The followings are the available columns in table 'tbl_facilitator':
 * @property integer $ProgramID
 * @property integer $FacilitatorID
 * @property string $FacilitatorName
 * @property string $FacilitatorLastName
 * @property string $FacilitatorFullName
 * @property string $BirthDate
 * @property string $EducationLevel
 * @property integer $DocumentTypeID
 * @property string $DocumentID
 * @property string $IsMale
 * @property integer $FacilitatorGroupID
 * @property integer $HourPerDay
 * @property integer $HourPerWeek
 * @property integer $HourPerMonth
 * @property integer $CountryID
 * @property integer $CityID
 * @property string $StartDate
 * @property string $EndDate
 * @property string $PhoneNumber
 * @property string $Whatsup
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Attendance[] $attendances
 * @property Cycle[] $cycles
 * @property CycleSession[] $cycleSessions
 * @property CycleSubject[] $cycleSubjects
 * @property City $city
 * @property Country $country
 * @property DocumentType $documentType
 * @property FacilitatorGroup $facilitatorGroup
 * @property Program $program
 * @property User $createdBy
 * @property User $updatedBy
 * @property User[] $users
 */
class Facilitator extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_facilitator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, FacilitatorName, FacilitatorLastName, FacilitatorFullName, BirthDate, IsMale, CountryID, CityID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, DocumentTypeID, FacilitatorGroupID, HourPerDay, HourPerWeek, HourPerMonth, CountryID, CityID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('FacilitatorName, FacilitatorLastName, EducationLevel, DocumentID, PhoneNumber, Whatsup', 'length', 'max'=>25),
			array('FacilitatorFullName', 'length', 'max'=>51),
			array('IsMale', 'length', 'max'=>1),
			array('StartDate, EndDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, FacilitatorID, FacilitatorName, FacilitatorLastName, FacilitatorFullName, BirthDate, EducationLevel, DocumentTypeID, DocumentID, IsMale, FacilitatorGroupID, HourPerDay, HourPerWeek, HourPerMonth, CountryID, CityID, StartDate, EndDate, PhoneNumber, Whatsup, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'attendances' => array(self::HAS_MANY, 'Attendance', 'FacilitatorID'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'FacilitatorID'),
			'cycleSessions' => array(self::HAS_MANY, 'CycleSession', 'FacilitatorID'),
			'cycleSubjects' => array(self::HAS_MANY, 'CycleSubject', 'FacilitatorID'),
			'city' => array(self::BELONGS_TO, 'City', 'CityID'),
                        'gender' => array(self::BELONGS_TO, 'Gender', 'IsMale'),
			'country' => array(self::BELONGS_TO, 'Country', 'CountryID'),
			'documentType' => array(self::BELONGS_TO, 'DocumentType', 'DocumentTypeID'),
			'facilitatorGroup' => array(self::BELONGS_TO, 'FacilitatorGroup', 'FacilitatorGroupID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'users' => array(self::HAS_MANY, 'User', 'FacilitatorID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'FacilitatorID' => 'Facilitator',
			'FacilitatorName' => 'Facilitator Name',
			'FacilitatorLastName' => 'Facilitator Last Name',
			'FacilitatorFullName' => 'Facilitator Full Name',
			'BirthDate' => 'Birth Date',
			'EducationLevel' => 'Education Level',
			'DocumentTypeID' => 'Document Type',
			'DocumentID' => 'Document',
			'IsMale' => 'Gender',
			'FacilitatorGroupID' => 'Facilitator Group',
			'HourPerDay' => 'Hour Per Day',
			'HourPerWeek' => 'Hour Per Week',
			'HourPerMonth' => 'Hour Per Month',
			'CountryID' => 'Country',
			'CityID' => 'City',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
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
		$criteria->compare('FacilitatorID',$this->FacilitatorID);
		$criteria->compare('FacilitatorName',$this->FacilitatorName,true);
		$criteria->compare('FacilitatorLastName',$this->FacilitatorLastName,true);
		$criteria->compare('FacilitatorFullName',$this->FacilitatorFullName,true);
		$criteria->compare('BirthDate',$this->BirthDate,true);
		$criteria->compare('EducationLevel',$this->EducationLevel,true);
		$criteria->compare('DocumentTypeID',$this->DocumentTypeID);
		$criteria->compare('DocumentID',$this->DocumentID,true);
		$criteria->compare('IsMale',$this->IsMale,true);
		$criteria->compare('FacilitatorGroupID',$this->FacilitatorGroupID);
		$criteria->compare('HourPerDay',$this->HourPerDay);
		$criteria->compare('HourPerWeek',$this->HourPerWeek);
		$criteria->compare('HourPerMonth',$this->HourPerMonth);
		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
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
	 * @return Facilitator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
