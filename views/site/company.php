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

                <!-- Trigger the modal with a button -->
                <?php if (\Yii::$app->user->id !== "100"): ?>
                    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#quoteModal">REQUEST FREE QUOTE</button>
                <?php endif; ?>
            </div>

            <div class="col-xs-3">
                <?= $this->render('_sidebar', [
                    'list' => $list,
                    'content' => $content,
                ]) ?>
            </div>

            <!-- Modal -->
            <div id="quoteModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center"><strong>QUICK FREE QUOTE</strong></h4>
                        </div>
                        <div class="modal-body">
                            <?php $form = ActiveForm::begin([
                                'action'=>'/site/quote'
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
                                    <?= Html::submitButton('REQUEST FREE QUOTE', ['class' => 'btn btn-warning btn-block']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
