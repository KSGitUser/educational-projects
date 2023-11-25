<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 */
class m190309_124320_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'auto_id' => $this->integer(),
            'path' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk_images_auto',
            'images',
            'auto_id',
            'auto',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_images_auto',
            '{{%images}}'
        );

        $this->dropTable('{{%images}}');
    }
}
