<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QouteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qoutes';
?>

<div class="content">
    <div class="container-fluid">
        <div class="qoute-index">
<!--            <p>-->
<!--                --><?//= Html::a('Create Qoute', ['create'], ['class' => 'btn btn-success']) ?>
<!--            </p>-->
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
//                    'id',
                    'name',
                    'email:email',
//                    'skype',
//                    'phone',
//                    'body:ntext',
                     'created_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>



