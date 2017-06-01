<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'PHP DEVELOPMENT';
?>

<div class="content">
    <div class="container" style="width: 50%; margin: auto; position: relative; padding-top: 20%">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
        ]); ?>

        <?= $form->field($model, 'password', [
            'inputOptions' => [
                'placeholder' => 'password']
        ])->passwordInput(['autofocus' => true])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-default btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

