<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
?>

<div class="content">
    <div class="container-fluid">
        <div class="content-index">
            <p>
                <?= Html::a('Add new page', ['create'], ['class' => 'btn btn-success btn-block']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'page',
                    'category',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['width' => '80'],
                        'template' => '{update} {delete} {/content/convert}',
                        'buttons' => [
                            '/content/convert' => function ($url) {
                                return Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', $url);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>



