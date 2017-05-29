<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Qoute */

$this->title = 'Create Qoute';
$this->params['breadcrumbs'][] = ['label' => 'Qoutes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qoute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
