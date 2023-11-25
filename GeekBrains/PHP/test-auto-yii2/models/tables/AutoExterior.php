<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "auto_exterior".
 *
 * @property int $auto_id
 * @property int $exterior_id
 *
 * @property Auto $auto
 * @property Exterior $exterior
 */
class AutoExterior extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_exterior';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auto_id', 'exterior_id'], 'required'],
            [['auto_id', 'exterior_id'], 'integer'],
            [['auto_id', 'exterior_id'], 'unique', 'targetAttribute' => ['auto_id', 'exterior_id']],
            [['auto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auto::className(), 'targetAttribute' => ['auto_id' => 'id']],
            [['exterior_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exterior::className(), 'targetAttribute' => ['exterior_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auto_id' => 'Auto ID',
            'exterior_id' => 'Exterior ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuto()
    {
        return $this->hasOne(Auto::className(), ['id' => 'auto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExterior()
    {
        return $this->hasOne(Exterior::className(), ['id' => 'exterior_id']);
    }
}
