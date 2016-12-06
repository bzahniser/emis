<?php

/**
 * This is the model class for table "tbl_age_range".
 *
 * The followings are the available columns in table 'tbl_age_range':
 * @property integer $RangeID
 * @property string $RangeName
 * @property integer $RangeFrom
 * @property integer $RangeTo
 * @property integer $Reporting
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property User $updatedBy
 * @property Cycle[] $cycles
 * @property Level[] $levels
 */
class AgeRange extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_age_range';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RangeName, RangeFrom, RangeTo, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('RangeFrom, RangeTo, Reporting, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('RangeName', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('RangeID, RangeName, RangeFrom, RangeTo, Reporting, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'cycles' => array(self::HAS_MANY, 'Cycle', 'AgeID'),
			'levels' => array(self::HAS_MANY, 'Level', 'RangeID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'RangeID' => 'Range',
			'RangeName' => 'Range Name',
			'RangeFrom' => 'Range From',
			'RangeTo' => 'Range To',
			'Reporting' => 'Reporting',
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

		$criteria->compare('RangeID',$this->RangeID);
		$criteria->compare('RangeName',$this->RangeName,true);
		$criteria->compare('RangeFrom',$this->RangeFrom);
		$criteria->compare('RangeTo',$this->RangeTo);
		$criteria->compare('Reporting',$this->Reporting);
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
	 * @return AgeRange the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
