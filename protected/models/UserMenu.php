<?php

/**
 * This is the model class for table "tbl_user_menu".
 *
 * The followings are the available columns in table 'tbl_user_menu':
 * @property integer $ID
 * @property integer $UserID
 * @property integer $StudentMenu
 * @property integer $CycleMenu
 * @property integer $CourseMenu
 * @property integer $MasterMenu
 * @property integer $SettingsMenu
 * @property integer $SideMenu
 * @property integer $TodayList
 * @property integer $AttendanceMenu
 */
class UserMenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserID, StudentMenu, CycleMenu, CourseMenu, MasterMenu, SettingsMenu, SideMenu, TodayList', 'required'),
			array('UserID, StudentMenu, CycleMenu, CourseMenu, MasterMenu, SettingsMenu, SideMenu, TodayList, AttendanceMenu', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, UserID, StudentMenu, CycleMenu, CourseMenu, MasterMenu, SettingsMenu, SideMenu, TodayList, AttendanceMenu', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'UserID' => 'User',
			'StudentMenu' => 'Student Menu',
			'CycleMenu' => 'Cycle Menu',
			'CourseMenu' => 'Course Menu',
			'MasterMenu' => 'Master Menu',
			'SettingsMenu' => 'Settings Menu',
			'SideMenu' => 'Side Menu',
			'TodayList' => 'Today List',
			'AttendanceMenu' => 'Attendance Menu',
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
		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('StudentMenu',$this->StudentMenu);
		$criteria->compare('CycleMenu',$this->CycleMenu);
		$criteria->compare('CourseMenu',$this->CourseMenu);
		$criteria->compare('MasterMenu',$this->MasterMenu);
		$criteria->compare('SettingsMenu',$this->SettingsMenu);
		$criteria->compare('SideMenu',$this->SideMenu);
		$criteria->compare('TodayList',$this->TodayList);
		$criteria->compare('AttendanceMenu',$this->AttendanceMenu);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
