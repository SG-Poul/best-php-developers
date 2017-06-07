<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$currentUrl = Yii::$app->request->url;
$urlArray = explode('/', Yii::$app->request->url);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container header-logo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="logo-text">
                    <t id="logo-text-1">Best-PHP-</t>
                    <t id="logo-text-2">Developers</t>
                    <t id="logo-text-3">.com</t>
                </div>
                <div id="logo-rectangle-1">
                    <p>QUALITY PHP DEVELOPMENT & PHP DEVELOPERS FOR HIRE</p>
                </div>
                <div id="logo-rectangle-2">
                    More than <strong style="color: #f2b824">80</strong> PHP developers.
                </div>
            </div>
            <div class="col-md-6">
                <div class="social-icon">
                    <a href="#"><img src="/img/vk.png"></a>
                    <a href="#"><img src="/img/gp.png"></a>
                    <a href="#"><img src="/img/fb.png"></a>
                    <a href="#"><img src="/img/tw.png"></a>
                </div>

                <div class="social-number">
                    <t class="ph-num">+1-347-630-0528</t>
                    <t class="ph-num">+49-302-5555-5704</t>
                    <t class="ph-num">+38-094-711-6778</t>
                    <img src="/img/ph.png">
                </div>

                <div class="social-number">
                    <t class="ph-num">Best.Developers</t>
                    <img src="/img/sk.png">
                </div>
            </div>
        </div>
    </div>

    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'PHP Development', 'url' => ['/site/company/development'], 'active' => ($urlArray[count($urlArray) - 1] == 'development')],
            ['label' => 'Hire PHP Developers', 'url' => ['/site/company/hire'], 'active' => ($urlArray[count($urlArray) - 1] == 'hire')],
            ['label' => 'Dedicated PHP Team', 'url' => ['/site/company/team'], 'active' => ($urlArray[count($urlArray) - 1] == 'team')],
            ['label' => 'Prices', 'url' => ['/site/company/prices'], 'active' => ($urlArray[count($urlArray) - 1] == 'prices')],
            ['label' => 'Projects', 'url' => ['/site/projects']],
            ['label' => 'Company', 'url' => ['/site/company/about'], 'active' => ($urlArray[count($urlArray) - 1] == 'about')],
            ['label' => 'Contacts', 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
    ?>
</div>

<div class="wrap">
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p><strong><a href="/site/company/about">About Us</a> | <a href="/site/contact">Contact</a>
                <p>Copyright &copy; best-php-developers.net | &copy; 2005 – <?= date('Y') ?></p>
            </div>
            <div class="col-md-6">
                <p>All rights Reserved. Design: best-php-developers.net Technologies</p>
            </div>
        </div>
    </div>
</footer>

<?php if (\Yii::$app->user->id === "100"): ?>
    <div style="position: fixed; width: 160px;  top: 30px; right: 30px; border: 2px solid #fab917;
                border-radius: 15px; padding: 6px; background-color: rgba(255,255,255,0.7); z-index: 9999">
        <div style="text-align: right">
            <?= Html::a('X', ['/admin/default/logout'], ['class' => 'btn btn-warning btn-small', 'data' => ['method' => 'post'],
                'style'=>'border-radius: 100%;']) ?>
        </div>
        <div style="text-align: center; margin-top: 5px">
            <?= Html::a('Quotes', ['/qoute'], ['class' => 'btn btn-warning btn-block']) ?>
            <?= Html::a('Pages', ['/content'], ['class' => 'btn btn-warning btn-block']) ?>
            <?= Html::a('Gallery', ['/site/company/gallery'], ['class' => 'btn btn-warning btn-block']) ?>
            <?= Html::a('Projects', ['#'], ['class' => 'btn btn-warning btn-block']) ?>


        </div>
    </div>
<?php endif; ?>

<?= \bluezed\scrollTop\ScrollTop::widget() ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
