<?php

namespace frontend\models;

use DateTime;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model {
	public $username;
	public $password;
	public $date_of_birth;
	public $status = 10;


	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[ 'username', 'trim' ],
			[ 'username', 'required' ],
			[ 'username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.' ],
			[ 'username', 'string', 'min' => 2, 'max' => 255 ],

			[ 'date_of_birth', 'trim' ],
			[ 'date_of_birth', 'required' ],
			[ 'date_of_birth', 'string' ],
			[ 'date_of_birth', 'checkUsersAge' ],

			[ 'password', 'required' ],
			[ 'password', 'string', 'min' => Yii::$app->params['user.passwordMinLength'] ],
		];
	}

	public function checkUsersAge($attribute, $params) {
		if (!$this->hasErrors()) {
			$currentDate = new DateTime(date( 'd.m.Y' ) );
			$dateOfBirth = new DateTime($this->date_of_birth);
			$interval = $currentDate->diff( $dateOfBirth );
			$intervalOfYears = $interval->y;
			if ( $intervalOfYears <= 5 ) {
				$this->addError( $attribute, 'Too young!' );
			} elseif ( $intervalOfYears > 150 ) {
				$this->addError( $attribute, 'Too old!' );
			}
		}
	}

	/**
	 * Signs user up.
	 *
	 * @return bool whether the creating new account was successful and email was sent
	 */
	public function signup() {
		if ( ! $this->validate() ) {
			return null;
		}

		$user = new User();
		$user->username = $this->username;
		$user->date_of_birth = $this->date_of_birth;
		$user->status = $this->status;
		$user->setPassword( $this->password );
		$user->generateAuthKey();
		$user->generateEmailVerificationToken();

		return $user->save();

	}
}
