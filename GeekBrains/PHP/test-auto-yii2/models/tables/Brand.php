<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $brand_name
 *
 * @property Auto[] $autos
 * @property Model[] $models
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => 'Марка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutos()
    {
        return $this->hasMany(Auto::class, ['brand_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Model::class, ['brand_id' => 'id']);
    }
}
