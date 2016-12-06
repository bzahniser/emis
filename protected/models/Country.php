<?php

/**
 * This is the model class for table "tbl_country".
 *
 * The followings are the available columns in table 'tbl_country':
 * @property integer $CountryID
 * @property string $CountryName
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Center[] $centers
 * @property City[] $cities
 * @property User $createdBy
 * @property User $updatedBy
 * @property Cycle[] $cycles
 * @property Facilitator[] $facilitators
 * @property Program[] $programs
 * @property Student[] $students
 * @property Student[] $students1
 * @property Student[] $students2
 * @property Student[] $students3
 * @property StudentExam[] $studentExams
 */
class Country extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CountryName, Active', 'required'),
			array('Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('CountryName', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CountryID, CountryName, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'centers' => array(self::HAS_MANY, 'Center', 'CountryID'),
			'cities' => array(self::HAS_MANY, 'City', 'CountryID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'CountryID'),
			'facilitators' => array(self::HAS_MANY, 'Facilitator', 'CountryID'),
			'programs' => array(self::HAS_MANY, 'Program', 'CountryID'),
			'students' => array(self::HAS_MANY, 'Student', 'BirthCountryID'),
			'students1' => array(self::HAS_MANY, 'Student', 'CurrentCountryID'),
			'students2' => array(self::HAS_MANY, 'Student', 'OriginalCountryID'),
			'students3' => array(self::HAS_MANY, 'Student', 'RgistrationCountryID'),
			'studentExams' => array(self::HAS_MANY, 'StudentExam', 'CountryID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CountryID' => 'CountryID',
			'CountryName' => 'Country',
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

		$criteria->compare('CountryID',$this->CountryID);
		$criteria->compare('CountryName',$this->CountryName,true);
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
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
