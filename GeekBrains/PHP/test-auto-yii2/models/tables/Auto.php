<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "auto".
 *
 * @property int $id
 * @property int $brand_id
 * @property int $mileage
 * @property double $price
 * @property string $phone
 *
 * @property Brand $brand
 * @property AutoExterior[] $autoExteriors
 * @property Exterior[] $exteriors
 * @property AutoSafety[] $autoSafeties
 * @property Safety[] $safeties
 */
class Auto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'model_id'], 'required'],
            [['brand_id', 'mileage', 'model_id'], 'integer'],
            [['price'], 'number'],
            [['phone'], 'string', 'max' => 12],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brand_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::class, 'targetAttribute' => ['model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'mileage' => 'Пробег',
            'price' => 'Цена',
            'phone' => 'Телефон',
            'model_id' => 'Model ID'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }


    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoExteriors()
    {
        return $this->hasMany(AutoExterior::className(), ['auto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExteriors()
    {
        return $this->hasMany(Exterior::className(), ['id' => 'exterior_id'])->viaTable('auto_exterior', ['auto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoSafeties()
    {
        return $this->hasMany(AutoSafety::className(), ['auto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSafeties()
    {
        return $this->hasMany(Safety::class, ['id' => 'safety_id'])->viaTable('auto_safety', ['auto_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::class, ['auto_id' => 'id']);
    }
}
