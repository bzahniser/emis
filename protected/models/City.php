<?php

/**
 * This is the model class for table "tbl_city".
 *
 * The followings are the available columns in table 'tbl_city':
 * @property integer $CityID
 * @property string $CityName
 * @property integer $CountryID
 * @property string $Region
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Center[] $centers
 * @property Country $country
 * @property User $createdBy
 * @property User $updatedBy
 * @property Cycle[] $cycles
 * @property Facilitator[] $facilitators
 * @property Student[] $students
 * @property Student[] $students1
 * @property Student[] $students2
 * @property StudentExam[] $studentExams
 */
class City extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CityName, CountryID, Active', 'required'),
			array('CountryID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('CityName, Region', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CityID, CityName, CountryID, Region, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'centers' => array(self::HAS_MANY, 'Center', 'CityID'),
			'country' => array(self::BELONGS_TO, 'Country', 'CountryID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'CityID'),
			'facilitators' => array(self::HAS_MANY, 'Facilitator', 'CityID'),
			'students' => array(self::HAS_MANY, 'Student', 'CurrentCityID'),
			'students1' => array(self::HAS_MANY, 'Student', 'OriginalCityID'),
			'students2' => array(self::HAS_MANY, 'Student', 'RegistrationCityID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'CityID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CityID' => 'CityID',
			'CityName' => 'City',
			'CountryID' => 'Country',
			'Region' => 'Region',
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

		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('CityName',$this->CityName,true);
		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('Region',$this->Region,true);
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
	 * @return City the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
