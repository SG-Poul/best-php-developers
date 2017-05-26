<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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
<div class="container">

    <div class="container">
        <div class="container row">
            <div class="col-xs-6">
                <div class="logo-text">
                    <t id="logo-text-1">Best-PHP-</t><t id="logo-text-2">Developers</t><t id="logo-text-3">.com</t>
                </div>
                <div id="logo-rectangle-1">
                    <p>QUALITY PHP DEVELOPMENT & PHP DEVELOPERS FOR HIRE</p>
                </div>
                <div id="logo-rectangle-2">
                    More than <strong style="color: #f2b824">80</strong> PHP developers.
                </div>
            </div>
            <div class="col-xs-6">
                <table class="inform-table">
                    <tr>
                        <td>
                            <div class="social-icon">
                                <a href="#"><img src="img/vk.png"></a>
                                <a href="#"><img src="img/gp.png"></a>
                                <a href="#"><img src="img/fb.png"></a>
                                <a href="#"><img src="img/tw.png"></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="social-icon">
                                <t class="ph-num">+1-347-630-0528</t>
                                <t class="ph-num">+49-302-5555-5704</t>
                                <t class="ph-num">+38-094-711-6778</t>
                                <img src="img/ph.png">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="social-icon">
                                <t class="ph-num">Best.Developers</t>
                                <img src="img/sk.png">
                            </div>
                        </td>
                    </tr>
                </table>
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
            ['label' => 'PHP Development', 'url' => ['/site/about']],
            ['label' => 'Hire PHP Developers', 'url' => ['/site/about']],
            ['label' => 'Dedicated PHP Team', 'url' => ['/site/about']],
            ['label' => 'Prices', 'url' => ['/site/about']],
            ['label' => 'Projects', 'url' => ['/site/about']],
            ['label' => 'Contacts', 'url' => ['/site/contact']],
            ['label' => 'Sitemap', 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
    ?>
</div>
<div class="wrap">



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
