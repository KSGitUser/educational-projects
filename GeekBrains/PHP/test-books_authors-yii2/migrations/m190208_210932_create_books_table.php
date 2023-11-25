<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m190208_210932_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'author_id' => $this->integer(),

        ]);

        $this->addForeignKey('idx_author_foreign', 'books', 'author_id',
            'authors', 'id','cascade', 'cascade' );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('{{%books}}');

    }
}
