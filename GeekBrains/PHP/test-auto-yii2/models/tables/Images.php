<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property int $auto_id
 * @property string $path
 *
 * @property Auto $auto
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auto_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['auto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auto::className(), 'targetAttribute' => ['auto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auto_id' => 'Auto ID',
            'path' => 'Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuto()
    {
        return $this->hasOne(Auto::class, ['id' => 'auto_id']);
    }
}
