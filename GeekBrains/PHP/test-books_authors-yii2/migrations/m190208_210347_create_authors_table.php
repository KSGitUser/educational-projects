<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m190208_210347_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function  Up()
    {
        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('{{%authors}}');
    }
}
