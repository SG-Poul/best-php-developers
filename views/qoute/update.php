<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qoute */

$this->title = 'Update Qoute: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Qoutes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="content">
    <div class="container-fluid">
        <div class="qoute-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>


