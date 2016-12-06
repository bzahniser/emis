<?php

/**
 * This is the model class for table "tbl_valuechange".
 *
 * The followings are the available columns in table 'tbl_valuechange':
 * @property integer $ProgramID
 * @property integer $ChangeID
 * @property integer $ChangeTypeID
 * @property string $ChangeTypeName
 * @property integer $RecordID
 * @property string $OldValue
 * @property string $NewValue
 * @property integer $ChangeReasonID
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
 */
class Valuechange extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_valuechange';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProgramID, ChangeTypeID, ChangeTypeName, RecordID, OldValue, NewValue, ChangeReasonID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('ProgramID, ChangeTypeID, RecordID, ChangeReasonID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('ChangeTypeName, OldValue, NewValue', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProgramID, ChangeID, ChangeTypeID, ChangeTypeName, RecordID, OldValue, NewValue, ChangeReasonID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProgramID' => 'Program',
			'ChangeID' => 'Change',
			'ChangeTypeID' => 'Change Type',
			'ChangeTypeName' => 'Change Type Name',
			'RecordID' => 'Record',
			'OldValue' => 'Old Value',
			'NewValue' => 'New Value',
			'ChangeReasonID' => 'Change Reason',
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
		$criteria->compare('ChangeID',$this->ChangeID);
		$criteria->compare('ChangeTypeID',$this->ChangeTypeID);
		$criteria->compare('ChangeTypeName',$this->ChangeTypeName,true);
		$criteria->compare('RecordID',$this->RecordID);
		$criteria->compare('OldValue',$this->OldValue,true);
		$criteria->compare('NewValue',$this->NewValue,true);
		$criteria->compare('ChangeReasonID',$this->ChangeReasonID);
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
	 * @return Valuechange the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
