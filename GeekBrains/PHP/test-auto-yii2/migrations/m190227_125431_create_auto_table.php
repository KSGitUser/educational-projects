<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auto}}`.
 */
class m190227_125431_create_auto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auto}}', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'mileage' => $this->integer(),
            'price' => $this->float(2),
            'phone' => $this->char(12),
        ]);

        $this->addForeignKey(
            'fk_auto_brand',
            '{{%auto}}',
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
            'fk_auto_brand',
            '{{%auto}}'
        );


        $this->dropTable('{{%auto}}');
    }
}
