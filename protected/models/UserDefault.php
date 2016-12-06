<?php

/**
 * This is the model class for table "tbl_user_default".
 *
 * The followings are the available columns in table 'tbl_user_default':
 * @property integer $ProgramID
 * @property integer $DefaultID
 * @property integer $UserID
 * @property string $FieldName
 * @property string $DefaultValue
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Program $program
 * @property User $createdBy
 * @property User $updatedBy
 * @property User $user
 */
class UserDefault extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user_default';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, UserID, FieldName, DefaultValue, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, UserID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('FieldName, DefaultValue', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, DefaultID, UserID, FieldName, DefaultValue, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'program' => array(self::BELONGS_TO, 'Program', 'ProgramID'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'CreatedBy'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'UpdatedBy'),
			'user' => array(self::BELONGS_TO, 'User', 'UserID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'DefaultID' => 'Default',
			'UserID' => 'User',
			'FieldName' => 'Field Name',
			'DefaultValue' => 'Default Value',
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
		$criteria->compare('DefaultID',$this->DefaultID);
		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('FieldName',$this->FieldName,true);
		$criteria->compare('DefaultValue',$this->DefaultValue,true);
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
	 * @return UserDefault the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
