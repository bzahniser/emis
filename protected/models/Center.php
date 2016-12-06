<?php

/**
 * This is the model class for table "tbl_center".
 *
 * The followings are the available columns in table 'tbl_center':
 * @property integer $ProgramID
 * @property integer $CenterID
 * @property string $CenterName
 * @property integer $CountryID
 * @property integer $CityID
 * @property integer $CoordinatorID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property City $city
 * @property Coordinator $coordinator
 * @property Country $country
 * @property Program $program
 * @property User $createdBy
 * @property User $updatedBy
 * @property Cycle[] $cycles
 * @property StudentExam[] $studentExams
 */
class Center extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_center';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, CenterName, CountryID, CityID, CoordinatorID, Active', 'required'),
			array('ProgramID, CountryID, CityID, CoordinatorID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('CenterName', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, CenterID, CenterName, CountryID, CityID, CoordinatorID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'CityID'),
			'coordinator' => array(self::BELONGS_TO, 'Coordinator', 'CoordinatorID'),
			'country' => array(self::BELONGS_TO, 'Country', 'CountryID'),
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'CenterID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'CenterID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'CenterID' => 'Center',
			'CenterName' => 'Center Name',
			'CountryID' => 'Country',
			'CityID' => 'City',
			'CoordinatorID' => 'Coordinator',
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
		$criteria->compare('CenterID',$this->CenterID);
		$criteria->compare('CenterName',$this->CenterName,true);
		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('CoordinatorID',$this->CoordinatorID);
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
	 * @return Center the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
