<?php

namespace app\models;


use app\models\tables\Auto;
use app\models\tables\AutoSafety;
use app\models\tables\Images;
use Imagine\Image\Box;
use yii\base\Model;
use app\models\tables\Brand;
use yii\imagine\Image;


/*
Additional model to load data from form

*/
class UploadForm extends Model
{
    public $id;
    public $brand_id;
    public $mileage;
    public $price;
    public $phone;
    public $model_id;
    public $auto_id;
    public $exterior_id;
    public $safety_id;
    public $model_name;
    public $imageFile;
    public $safeties;

    public function rules()
    {
        return [
            [['brand_id', 'model_id', 'price', 'phone'], 'required'],
            [['brand_id', 'mileage'], 'integer'],
            [['price'], 'number'],
            [['phone'], 'string', 'max' => 12],
            [['brand_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Brand::class,
                'targetAttribute' => ['brand_id' => 'id']],
            ['imageFile', 'file', 'maxFiles' => 3, 'extensions' => 'jpg, png'],
            [['safeties', 'model_id'], 'safe'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Марка',
            'mileage' => 'Пробег',
            'price' => 'Цена',
            'phone' => 'Телефон',
            'model_id' => 'Model ID',
            'safeties' => 'Безопасность',
            'imageFile' => 'Фотографии',
        ];
    }

    public function saveAuto() {
        $auto = new Auto();
        $auto->brand_id=$this->brand_id;
        $auto->mileage = $this->mileage;
        $auto->price = $this->price;
        $auto->phone = $this->phone;
        $auto->model_id = $this->model_id;
        $auto->save();
        $this->safetiesAdd($auto->id);
        $this->uploadFile($auto);
        $this->id = $auto->id;
    }


    public function uploadFile($auto)
    {
        if ($this->validate()) {

            foreach ($this->imageFile as $file) {
                $filename = $file->getBaseName() . "_" . time() . "." . $file->extension;
                $filePath = \Yii::getAlias("@img/{$filename}");
                $file->saveAs($filePath);
                $images = new Images();
                $images->auto_id = $auto->id;
                $images->path = $filename;
                $images->save();
                $img = Image::getImagine()->open($filePath);
                $size = $img->getSize();
                $imageWidth = $size->getWidth();
                $imageHeight = $size->getHeight();
                $middleWidth = 720;
                $middleHeight = 540;
                $ratioWidth = $imageWidth/$middleWidth;
                $ratioHeight = $imageHeight/$middleHeight;

                if ($ratioWidth>=$ratioHeight) {

                    $newSize = $img->getSize()->widen(720);
                    Image::thumbnail($filePath, $newSize->getWidth(), $newSize->getHeight())
                        ->save(\Yii::getAlias("@img/middle/720-{$filename}"));
                    $newSize = $img->getSize()->widen(146);
                    Image::thumbnail($filePath, $newSize->getWidth(), $newSize->getHeight())
                        ->save(\Yii::getAlias("@img/small/146-{$filename}"));

                } else {
                    $newSize = $img->getSize()->heighten(540);
                    Image::thumbnail($filePath, $newSize->getWidth(), $newSize->getHeight())
                        ->save(\Yii::getAlias("@img/middle/720-{$filename}"));
                    $newSize = $img->getSize()->heighten(106);
                    Image::thumbnail($filePath, $newSize->getWidth(), $newSize->getHeight())
                        ->save(\Yii::getAlias("@img/small/146-{$filename}"));

                }

            }
        }
    }

    public function safetiesAdd($autoId) {

        if (!empty($this->safeties)) {
        foreach ($this->safeties as $safety) {
            $autoSafety = new AutoSafety();
            $autoSafety->auto_id = $autoId;
            $autoSafety->safety_id = $safety;
            $autoSafety->save();

        }
        }
    }

    public function getOne($id)
    {
        $auto = Auto::find()->select()->where("id = {$id}")->one();

    }


}