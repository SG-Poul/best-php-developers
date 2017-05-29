<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Best PHP developers';
?>

<div class="main-hire">
    <img src="/img/main_hire_bg.png">
    <div class="content">
        <h2><strong>HIRE PHP DEVELOPERS</strong></h2>
        <div class="row">
            <div class="col-xs-6">
                <br>
                <p>
                    All our developers have to attend different seminars and courses; in such a way, we make sure that
                    they are well-aware of all software development branches and modern tendencies. Every department is
                    headed with a supervisor that is responsible for continuous learning of its members.
                </p>
            </div>
        </div>
        <p style="font-size: 20px; padding-top: 25px"><a class="btn btn-lg btn-warning" href="#">REQUEST FREE QUOTE</a>
        </p>
    </div>
</div>

<div class="main-description">
    <img src="/img/main_info_bg.png">
    <div class="content">
        <div class="top-left">
            <img src="/img/main_info_gears.png">
            <h2><strong>PHP DEVELOPMENT</strong></h2>
            <br>
            <p>Our PHP developers’ expertise and skills will be beneficial for any business owner who desires to
                focus solely on their business management without wasting time on additional tasks.</p>
        </div>
        <div class="top-right">
            <img src="/img/main_info_server.png">
            <h2><strong>DEDICATED PHP TEAM</strong></h2>
            <br>
            <p>Best-php-developers.com offers only custom made projects, favorable and customer-oriented contract
                terms and reasonable pricing system.</p>
        </div>
        <div class="bottom-left">
            <img src="/img/main_info_shell.png">
            <h2><strong>PHP DEVELOPERS</strong></h2>
            <br>
            <p>All dedicated teams consisting of PHP developers at best-php-developers.com work remotely and serve as
                an IT outsourcing department that always adhere to the customers’ specifications and instructions.</p>
        </div>
        <div class="bottom-right">
            <img src="/img/main_info_growth.png">
            <h2><strong>OUR BENEFITS</strong></h2>
            <br>
            <p>Best-php-developers.com is aware of the modern workflow market and is acquainted with most universities
                to employ suitable employees and expose them to constant training.</p>
        </div>
    </div>
</div>

<div class="main-form">
    <img src="/img/main_form_bg.png">
    <div class="content">
        <br>
        <h2>
            <strong>QUICK FREE QUOTE</strong>
        </h2>
        <p>
            <strong>Senior developers. Take a 1 week risk free trial.<br>
                Starting at $1250 a month.
            </strong>
        </p>
        <p style="font-family: Helvetical-light">None of your personal data will be sold. No spam is guaranteed.</p>
        <br/>
        <br/>
        <?php $form = ActiveForm::begin(); ?>
        <table>
            <tr>
                <td>
                    <?= $form->field($model, 'name', [
                        'inputOptions' => [
                            'placeholder' => 'Name *']
                    ])->textInput()->label(false) ?>
                </td>
                <td>
                    <?= $form->field($model, 'email', [
                        'inputOptions' => [
                            'placeholder' => 'Email *']
                    ])->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $form->field($model, 'skype', [
                        'inputOptions' => [
                            'placeholder' => 'Skype *']
                    ])->textInput()->label(false) ?>
                </td>
                <td>
                    <?= $form->field($model, 'phone', [
                        'inputOptions' => [
                            'placeholder' => 'Phone *']
                    ])->textInput()->label(false) ?>
                </td>
            </tr>
        </table>
        <?= $form->field($model, 'body', [
                        'inputOptions' => [
                            'placeholder' => 'Requirements']
                    ])->textarea(['rows' => 4])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('REQUEST FREE QUOTE NOW!', ['class' => 'btn btn-warning']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
