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
                <!-- Image section Start -->

                <?php
                $imgCount = 0;
                foreach ($images as $img) {
                    echo '<div class="photo-container-small"><a title="\\' . $img . '" href="#"><img class="img-responsive img-modal" src="/' . $img . '"></a></div>';
                }
                ?>
                <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" type="button" data-dismiss="modal">×</button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <?php if (\Yii::$app->user->id === "100"): ?>
                                <div class="modal-footer">
                                    <button class="btn btn-danger delete-image">Delete</button>
                                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>



                <?php
                $imageScript = <<< JS
        $('.img-modal').click(function(){
            $('.modal-body').empty();
  	        $($(this).parents('div').html()).appendTo('.modal-body');
  	        $('#myModal').modal({show:true});
        });
        $('.delete-image').click(function(event){
            event.preventDefault();
  	        var image = $('.modal-body').find('img').attr('src');
  	        console.log(image);
  	        $.post( "/site/delete-img", { img : image })
              .done(function( data ) {
                location.reload();
              });
        });
JS;
                $this->registerJs($imageScript, yii\web\View::POS_READY);
                ?>
                <!-- Image section End -->

                <?php if (\Yii::$app->user->id === "100"): ?>
                    <?php $form = ActiveForm::begin([
                        'options' => ['enctype' => 'multipart/form-data'],
                        'action'=>'/site/upload-img'
                    ]); ?>
                    <?= $form->field($uploadModel, 'uploadedFiles[]')->fileInput(['multiple' => true, 'class' => 'upload, image-input'])->label(false) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Upload', ['class' => 'btn btn-warning btn-block']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                <?php endif; ?>

            </div>

            <div class="col-xs-3">
                <?=$this->render('_sidebar', [
                    'list' => $list,
                    'content' => $content,
                ]) ?>
            </div>



        </div>
    </div>
</div>
