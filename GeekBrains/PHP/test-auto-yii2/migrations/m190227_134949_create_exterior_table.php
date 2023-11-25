<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exterior}}`.
 */
class m190227_134949_create_exterior_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exterior}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%exterior}}');
    }
}
