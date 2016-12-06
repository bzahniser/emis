<?php

/**
 * This is the model class for table "v_student_cycle_summary".
 *
 * The followings are the available columns in table 'v_student_cycle_summary':
 * @property integer $StudentID
 * @property integer $CycleID
 * @property string $CycleName
 * @property integer $Withdrawl
 * @property string $StartDate
 * @property string $EndDate
 * @property string $SessionLastM
 * @property string $PrsentM
 * @property string $AbsentM
 * @property string $LeaveM
 */
class VStudentCycleSummary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'v_student_cycle_summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('StudentID', 'required'),
			array('StudentID, CycleID, Withdrawl', 'numerical', 'integerOnly'=>true),
			array('CycleName', 'length', 'max'=>25),
			array('SessionLastM', 'length', 'max'=>42),
			array('PrsentM', 'length', 'max'=>45),
			array('AbsentM', 'length', 'max'=>55),
			array('LeaveM', 'length', 'max'=>56),
			array('StartDate, EndDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('StudentID, CycleID, CycleName, Withdrawl, StartDate, EndDate, SessionLastM, PrsentM, AbsentM, LeaveM', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'StudentID' => 'Student',
			'CycleID' => 'Cycle',
			'CycleName' => 'Cycle Name',
			'Withdrawl' => 'Withdrawl',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'SessionLastM' => 'Session Last M',
			'PrsentM' => 'Prsent M',
			'AbsentM' => 'Absent M',
			'LeaveM' => 'Leave M',
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

		$criteria->compare('StudentID',$this->StudentID);
		$criteria->compare('CycleID',$this->CycleID);
		$criteria->compare('CycleName',$this->CycleName,true);
		$criteria->compare('Withdrawl',$this->Withdrawl);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('SessionLastM',$this->SessionLastM,true);
		$criteria->compare('PrsentM',$this->PrsentM,true);
		$criteria->compare('AbsentM',$this->AbsentM,true);
		$criteria->compare('LeaveM',$this->LeaveM,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VStudentCycleSummary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
