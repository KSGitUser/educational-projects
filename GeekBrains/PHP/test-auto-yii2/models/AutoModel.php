<?php

namespace app\models;


use app\models\tables\Auto;

class AutoModel extends Auto
{
    public function deleteItem($id) {

        $model = Auto::find()->select('*')->where("id={$id}")->with('images')->one();

       if (!empty($model->images)) {
           foreach ($model->images as $image) {
               $filePath = \Yii::getAlias("@img/{$image->path}");
               $this->deleteFile($filePath);
               $filePath = \Yii::getAlias("@img/small/146-{$image->path}");
               $this->deleteFile($filePath);
               $filePath = \Yii::getAlias("@img/middle/720-{$image->path}");
               $this->deleteFile($filePath);
           }
       }
       $model->delete();
    }

    private function deleteFile($filePath) {
    if (is_file($filePath)) {
        unlink($filePath);
    }
}

}