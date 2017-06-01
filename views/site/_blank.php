<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'PHP DEVELOPMENT';
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9">

                <p>

                </p>

                <h3><strong> </strong></h3>

                <p>
                    <strong> </strong>
                </p>
                <i>
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </i>

            </div>
            <div class="col-xs-3">
                <?= $this->render('_sidebar', [
                    'group' => 'company',
                    'item' => '',
                ]) ?>
            </div>
        </div>
    </div>
</div>
