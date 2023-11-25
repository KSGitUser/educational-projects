<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%model}}`.
 */
class m190227_125343_create_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%model}}', [
            'id' => $this->primaryKey(),
            'model_name' => $this->string(),
            'brand_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_model_brand',
            '{{%model}}',
            'brand_id',
            '{{%brand}}',
            'id',
            'CASCADE',
            'CASCADE'
        );



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk_model_brand',
            '{{%model}}'
        );

        $this->dropTable('{{%brand}}');
    }
}
