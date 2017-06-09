<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

$this->title = 'Best PHP developers';

$this->registerJs(
    "
        (function($) {
            $.fn.goTo = function() {
                $('html, body').animate({
                    scrollTop: $(this).offset().top + 'px'
                }, 'fast');
                return this; // for chaining...
            }
        })(jQuery);

        $('#quoteBtn').on('click', function(e) {
            e.preventDefault();
            $('.main-form').goTo();
        });
    ",
    View::POS_READY,
    'my-button-handler'
);
?>

<div class="main-hire">
    <!--    <img src="/img/main_hire_bg.png">-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6">
                    <h2><strong>HIRE PHP DEVELOPERS</strong></h2>
                    <br/>
                    <p>
                        All our developers have to attend different seminars and courses; in such a way, we make sure that
                        they are well-aware of all software development branches and modern tendencies. Every department is
                        headed with a supervisor that is responsible for continuous learning of its members.
                    </p>
                    <br/>
                    <a id="quoteBtn" style="font-size: 20px" class="btn btn-lg btn-warning">REQUEST FREE QUOTE</a>
                    <br/><br/><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-description">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6">
                    <img src="/web/img/main_info_gears.png">
                    <h2><strong>PHP DEVELOPMENT</strong></h2>
                    <br/>
                    <p>Our PHP developers’ expertise and skills will be beneficial for any business owner who desires to
                        focus solely on their business management without wasting time on additional tasks.</p>
                </div>
                <div class="col-xs-6">
                    <img src="/web/img/main_info_server.png">
                    <h2><strong>DEDICATED PHP TEAM</strong></h2>
                    <br/>
                    <p>Best-php-developers.com offers only custom made projects, favorable and customer-oriented contract
                        terms and reasonable pricing system.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <img src="/web/img/main_info_shell.png">
                    <h2><strong>PHP DEVELOPERS</strong></h2>
                    <br/>
                    <p>All dedicated teams consisting of PHP developers at best-php-developers.com work remotely and serve
                        as an IT outsourcing department that always adhere to the customers’ specifications and
                        instructions.</p>
                </div>
                <div class="col-xs-6">
                    <img src="/web/img/main_info_growth.png">
                    <h2><strong>OUR BENEFITS</strong></h2>
                    <br/>
                    <p>Best-php-developers.com is aware of the modern workflow market and is acquainted with most
                        universitiesto employ suitable employees and expose them to constant training.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-form">
    <div class="content">
        <br>
        <h2>
            <strong>QUICK FREE QUOTE</strong>
        </h2>
        <p>
            <strong>
                Senior developers. Take a 1 week risk free trial.<br>
                Starting at $1250 a month.
            </strong>
        </p>
        <p style="font-family: Helvetical-light">None of your personal data will be sold. No spam is guaranteed.</p>
        <br/>
        <br/>
        <?php $form = ActiveForm::begin([
            'action'=>'/web/site/quote'
        ]); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'name', [
                        'inputOptions' => [
                            'placeholder' => 'Name *']
                    ])->textInput()->label(false) ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'email', [
                        'inputOptions' => [
                            'placeholder' => 'Email *']
                    ])->textInput()->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'skype', [
                        'inputOptions' => [
                            'placeholder' => 'Skype *']
                    ])->textInput()->label(false) ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'phone', [
                        'inputOptions' => [
                            'placeholder' => 'Phone *']
                    ])->textInput()->label(false) ?>
                </div>
            </div>
            <?= $form->field($model, 'body', [
                'inputOptions' => [
                    'placeholder' => 'Requirements']
            ])->textarea(['rows' => 4])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('REQUEST FREE QUOTE NOW!', ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="main-about">
    <div class="content">
        <h2><strong>WHO ARE WE</strong></h2>
        <ul>
            <li>Superior technology skills</li>
            <li>Addition to your in-house team members</li>
            <li>Adherence to the market demands</li>
            <li>24/7/365 client support service</li>
            <li>The use of vast knowledge in software development</li>
            <li>Quality Certification</li>
            <li>Strict adherence to the deadlines and superior quality work</li>
            <li>Reasonable and fair prices for PHP development projects in programming</li>
            <li>Numerous clients all around the world</li>
            <li>Only highly experienced members that work in PHP</li>
        </ul>
        <br/>
    </div>
</div>

<div class="main-orange">
    <div class="container">
        <p>WE WILL BE HAPPY TO SERVE ALL YOUR IT NEEDS.<br>
            DO NOT HESITATE TO CONTACT US IN CASE OF ANY ISSUES</p>
    </div>
</div>