<?php

/**
 * This is the model class for table "tbl_student_related".
 *
 * The followings are the available columns in table 'tbl_student_related':
 * @property integer $ID
 * @property integer $StudentID
 * @property integer $RelatedID
 * @property string $RelatedType
 * @property integer $RelatedTypeID
 * @property integer $Active
 * @property string $Created
 * @property integer $CreatedBy
 * @property string $Updated
 * @property integer $UpdatedBy
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property User $createdBy
 * @property User $updatedBy
 */
class StudentRelated extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_student_related';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('StudentID, RelatedID, RelatedType, RelatedTypeID, Active, Created, CreatedBy, Updated, UpdatedBy', 'required'),
			array('StudentID, RelatedID, RelatedTypeID, Active, CreatedBy, UpdatedBy', 'numerical', 'integerOnly'=>true),
			array('RelatedType', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, StudentID, RelatedID, RelatedType, RelatedTypeID, Active, Created, CreatedBy, Updated, UpdatedBy', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'StudentID'),
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
			'ID' => 'ID',
			'StudentID' => 'Student',
			'RelatedID' => 'Related',
			'RelatedType' => 'Related Type',
			'RelatedTypeID' => 'Related Type',
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
		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('RelatedID',$this->RelatedID);
		$criteria->compare('RelatedType',$this->RelatedType,true);
		$criteria->compare('RelatedTypeID',$this->RelatedTypeID);
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
	 * @return StudentRelated the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
