<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "auto_safety".
 *
 * @property int $auto_id
 * @property int $safety_id
 *
 * @property Auto $auto
 * @property Safety $safety
 */
class AutoSafety extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_safety';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auto_id', 'safety_id'], 'required'],
            [['auto_id', 'safety_id'], 'integer'],
            [['auto_id', 'safety_id'], 'unique', 'targetAttribute' => ['auto_id', 'safety_id']],
            [['auto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auto::className(), 'targetAttribute' => ['auto_id' => 'id']],
            [['safety_id'], 'exist', 'skipOnError' => true, 'targetClass' => Safety::className(), 'targetAttribute' => ['safety_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'auto_id' => 'Auto ID',
            'safety_id' => 'Safety ID',
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
    public function getSafety()
    {
        return $this->hasOne(Safety::className(), ['id' => 'safety_id']);
    }
}
