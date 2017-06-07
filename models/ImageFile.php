<?php
namespace app\models;

use yii\base\Model;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\web\UploadedFile;

class ImageFile extends Model
{
    public $uploadedFiles;

    public function rules()
    {
        return [
            [['uploadedFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10]];
    }

    public function upload()
    {
        if ($this->validate()) {
            $imageCount = 1;
            foreach ($this->uploadedFiles as $file) {
                if ($file->extension == 'png') {
                    $file->saveAs('img/gallery/' . $file->baseName . '.png');
                } else if ($file->error == UPLOAD_ERR_OK) {
                    imagepng(imagecreatefromstring(file_get_contents($file->tempName)), 'img/gallery/' . $file->baseName . '.png', 9, PNG_ALL_FILTERS);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function getImages()
    {
        return FileHelper::findFiles('img\gallery\\', ['only'=>['*.png', '*.jpg', '*.jpeg']]);
    }

    public function deleteImage($imageName)
    {
        unlink('img/gallery/' . $imageName);
    }
}