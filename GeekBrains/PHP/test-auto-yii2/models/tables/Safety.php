<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "safety".
 *
 * @property int $id
 * @property string $name
 *
 * @property AutoSafety[] $autoSafeties
 * @property Auto[] $autos
 */
class Safety extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'safety';
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
    public function getAutoSafeties()
    {
        return $this->hasMany(AutoSafety::className(), ['safety_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutos()
    {
        return $this->hasMany(Auto::className(), ['id' => 'auto_id'])->viaTable('auto_safety', ['safety_id' => 'id']);
    }
}
