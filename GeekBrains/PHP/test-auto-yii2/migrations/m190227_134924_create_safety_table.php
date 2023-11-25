<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%safty}}`.
 */
class m190227_134924_create_safety_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%safety}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%safety}}');
    }
}
