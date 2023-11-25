<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brand}}`.
 */
class m190227_125237_create_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%brand}}', [
            'id' => $this->primaryKey(),
            'brand_name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%model}}');
    }
}
