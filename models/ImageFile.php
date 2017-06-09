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
            [['uploadedFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 20]];
    }

    public function upload()
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        }

        if ($this->validate()) {
            $imageCount = 1;
            foreach ($this->uploadedFiles as $file) {
                if ($file->error == UPLOAD_ERR_OK) {
                    $file->saveAs('..' .DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . $file->baseName . '.' .  $file->extension);
//                    $this->resize_image($file->baseName . '.' .  $file->extension, 190, 160);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function resize_image($file, $w, $h, $crop=true) {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        }

        list($width, $height) = getimagesize('web/img/gallery/' . $file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        $ext = pathinfo('web/img/gallery/' . $file, PATHINFO_EXTENSION);
        if ($ext === 'png') {
            $src = imagecreatefrompng('web/img/gallery/' . $file);
        } else {
            $src = imagecreatefromjpeg('web/img/gallery/' . $file);
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);
        if ($ext === 'png') {
            imagealphablending( $dst, false );
            imagesavealpha( $dst, true );
        }

        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        if ($ext === 'png') {
            imagepng($dst, 'web/img/gallery/s_' . $file);
        } else {
            imagejpeg($dst, 'web/img/gallery/s_' . $file);
        }

//        imagepng(imagecreatefromstring($dst), 'img/gallery/s_' . $file->baseName . '.png', 9, PNG_ALL_FILTERS);

//        return $dst;
    }

    public function getImages()
    {
//        echo basename(__DIR__);
//        return null;
        return FileHelper::findFiles( '..' .DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'gallery', ['only'=>['*.png', '*.jpg', '*.jpeg'], 'except'=>['s_*']]);
//        $newArray = [];
//        foreach ($array as $img) {
//            $tmpA = explode('\\', $img);
//            $smName = 'img\gallery\s_' . $tmpA[count($tmpA) - 1];
//            $tmp = ['normal' => $img, 'small' => $smName];
////            print_r($tmp);
//            echo '<br/>';
//            $newArray[] = $tmp;
//        }
////        print_r($newArray);
//        return $newArray;
    }

    public function deleteImage($imageName)
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        }
        $str = ltrim($imageName, DIRECTORY_SEPARATOR);
        unlink($str);
//        unlink('img/gallery/s_' . $imageName);
    }
}