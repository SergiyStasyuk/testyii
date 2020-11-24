<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

class Counter extends Model {
	public function update() {
		$user = User::findOne( Yii::$app->user->id );
		++ $user->counter;
		$user->save();
	}
}