<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use vova07\imperavi\Widget;

$this->title = 'BEST-PHP-DEVELOPERS';
?>

<div class="content basic-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9">
                <?php if (\Yii::$app->user->id === "100"): ?>
                    <?php
                    $form = ActiveForm::begin([
                            'action'=>'/content/save'
                    ]);
                    echo $form->field($content, 'body')->widget(Widget::className(), [
                        'settings' => [
                            'lang' => 'en',
                            'minHeight' => 200,
                            'plugins' => [
                            ]
                        ]
                    ])->label(false);
                    echo $form->field($content, 'id')->hiddenInput(['value'=> $content->id])->label(false);
                    echo $form->field($content, 'page')->hiddenInput(['value'=> $content->page])->label(false);
                    echo $form->field($content, 'category')->hiddenInput(['value'=> $content->category])->label(false);
                    ?>
                    <div class="form-group">
                        <?= Html::submitButton('Save changes', ['class' => 'btn btn-warning btn-block']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                <?php else: ?>
                    <?= $content->body ?>
                <?php endif; ?>
            </div>

            <div class="col-xs-3">
                <?= $this->render('_sidebar', [
                    'list' => $list,
                    'content' => $content,
                ]) ?>
            </div>
        </div>
    </div>
</div>
