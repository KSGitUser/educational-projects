<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "exterior".
 *
 * @property int $id
 * @property string $name
 *
 * @property AutoExterior[] $autoExteriors
 * @property Auto[] $autos
 */
class Exterior extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exterior';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoExteriors()
    {
        return $this->hasMany(AutoExterior::className(), ['exterior_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutos()
    {
        return $this->hasMany(Auto::className(), ['id' => 'auto_id'])->viaTable('auto_exterior', ['exterior_id' => 'id']);
    }
}
