<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model LoginForm */

use common\models\LoginForm;
use yii\helpers\Html;

$this->title = 'Counter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login text-center ">


	<div class="row">
		<div class="col-lg-4 text-center col-lg-offset-4">
			<?php echo Html::beginForm(); ?>

			<h1 style="font-size: 20rem;"><?= (Yii::$app->user->identity->counter === null) ? 0 : Yii::$app->user->identity->counter ?></h1>
			<?php echo Html::hiddenInput('counter', true)?>
			<div class="form-group">
				<?= Html::submitButton('+1', ['class' => 'btn btn-primary', 'name' => 'counter-button']) ?>
			</div>
			<?php echo Html::endForm(); ?>
            <?php echo Html::beginForm(['/site/logout'], 'post'); ?>
                <div class="form-group">
                    <?= Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-danger']
                    ) ?>
                </div>
            <?php echo Html::endForm(); ?>
		</div>
	</div>
</div>