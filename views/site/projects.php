<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use vova07\imperavi\Widget;
use yii\helpers\Url;

$this->title = 'BEST-PHP-DEVELOPERS';
?>

<div class="content basic-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9">
                <?php if (\Yii::$app->user->id === "100"): ?>
                    <?= Html::a('Add new', ['/content/project-new'], ['class' => 'btn btn-success btn-block', 'data' => ['method' => 'post']]) ?>
                    <br/>
                <?php endif; ?>

                <?php foreach ($projects as $project): ?>

                    <div class="project-container">
                        <div class="project-body" id="<?= 'project_' . $project->id ?>">
                            <?= $project->body ?>
                        </div>
                        <?php if (\Yii::$app->user->id === "100"): ?>
                            <div class="edit-button-div">
                                <?= Html::a('Edit', false, ['class' => 'btn btn-warning btn-block edit-project', 'id' => $project->id]) ?>
                            </div>
                        <?php endif; ?>
                        <br/>
                    </div>
                <?php endforeach;?>

                <!-- Trigger the modal with a button -->
                <?php if (\Yii::$app->user->id !== "100"): ?>
                    <br/>
                    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#quoteModal">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        REQUEST FREE QUOTE
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    </button>
                    <br/>
                <?php endif; ?>
            </div>

            <div class="col-xs-3">
                <?= $this->render('_sidebar', [
                    'list' => $list,
                    'content' => $content,
                ]) ?>
            </div>

            <!-- Quote Modal -->
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
                                    <?= Html::submitButton('REQUEST FREE QUOTE', ['class' => 'btn btn-warning btn-block']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>
            </div>
            <!--Project modal-->
            <?php if (\Yii::$app->user->id === "100"):

                $imageScript = <<< JS
        $('.edit-project').click(function(){
            var id = $(this).attr('id');
            var body = $('#project_' + String(id)).html();
            $('#portfolio-id').val(id);
            $('#portfolio-body').val(body);
            $('.redactor-editor').html(body);
            // console.log('id is ' + id);
  	        $('#projectModal').modal({show:true});
        });
JS;
                $this->registerJs($imageScript, yii\web\View::POS_READY);


            ?>


            <div id="projectModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <?php
                            $tmpModel = new \app\models\Portfolio();
                            $form = ActiveForm::begin([
                                'action'=>'/web/content/project-save'
                            ]);
                            echo $form->field($tmpModel, 'body')->widget(Widget::className(), [
                                'settings' => [
                                    'lang' => 'ru',
                                    'minHeight' => 300,
                                    'imageUpload' => Url::to(['/content/image-upload']),
                                    'imageManagerJson' => Url::to(['/content/images-get']),
                                    'plugins' => [
                                        'fullscreen',
                                        'clips',
                                        'table',
                                        'video',
                                        'fontsize',
                                        'fontfamily',
                                        'fontcolor',
                                        'imagemanager',
                                    ]
                                ]
                            ])->label(false);
                            echo $form->field($tmpModel, 'id')->hiddenInput(['value'=> '1'])->label(false);
                            ?>
                            <div class="form-group">
                                <?= Html::a('Delete project', ['/content/project-delete'], ['class' => 'btn btn-danger',
                                    'id'=>'delete-project','data' => ['method' => 'post', 'id' => '1']]) ?>
                                <?= Html::submitButton('Save changes', ['class' => 'btn btn-warning']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
