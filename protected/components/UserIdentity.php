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
	 * $user['password']!==md5($this->password)
	 */
	
	private $_id;

	public function authenticate()
	{
        $adminBehavior = new AdminBehavior();
        $user = $adminBehavior->getUserToAdmin($this->username);
        //var_dump($user); die();
		if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
            $this->_id = $user->id;
            $this->username=$user->username;
            Yii::app()->session['user'] = $user;
            /*Yii::app()->user->setState('username', $user['username']);
            Yii::app()->user->setState('id', $user['id']);*/
			//修改登录时间
			$res = $adminBehavior->updateLoginTime($user['id']);
			if(!$res){
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			}
			$this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}

	public function getId(){
		return $this->_id;
	}
}