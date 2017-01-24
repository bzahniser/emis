<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	public function authenticate()
	{
		$record= User::model()->findByAttributes(array('LoginName'=>$this->username,'Active'=>'1'));
                
                //$record= User::model()->findByAttribu
		if($record==NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($record->Password!==crypt ($this->password,'salt'))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
                {
                        $this->_id=$record->UserID;
                        $role= AuthAssignment::model()->findByAttributes(array('userid'=>$record->UserID));
                        $this->setState('role', $role->itemname);
                        $this->setState('username', $this->username);
                        $this->setState('userid', $record->UserID);
                        if(isset($record->ProgramID))
                            Yii::app()->user->setState('ProgramID', $record->ProgramID);
                        else 
                            Yii::app()->user->setState('ProgramID', 0);
                        Yii::app()->user->setState('SessionOnlyAttendance', $record->SessionOnlyAttendance);
                        Yii::app()->user->setState('FacilitatorID', $record->FacilitatorID);
                        $modellog=new Log();
                        $modellog->TypeID=1;
                        $modellog->UserID=$record->UserID;
                        $modellog->Done=1;
                        $modellog->ActionTS=date("Y-m-d h:i:sa");
                        $modellog->save();
                        
                        $this->errorCode=self::ERROR_NONE;
                }
		return !$this->errorCode;
	}
        
        public function getId() {
            return $this->_id;
        }
}