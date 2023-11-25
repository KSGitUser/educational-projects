<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auto_exterior}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%auto}}`
 * - `{{%exterior}}`
 */
class m190227_142433_create_junction_table_for_auto_and_exterior_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auto_exterior}}', [
            'auto_id' => $this->integer(),
            'exterior_id' => $this->integer(),
            'PRIMARY KEY(auto_id, exterior_id)',
        ]);

        // creates index for column `auto_id`
        $this->createIndex(
            '{{%idx-auto_exterior-auto_id}}',
            '{{%auto_exterior}}',
            'auto_id'
        );

        // add foreign key for table `{{%auto}}`
        $this->addForeignKey(
            '{{%fk-auto_exterior-auto_id}}',
            '{{%auto_exterior}}',
            'auto_id',
            '{{%auto}}',
            'id',
            'CASCADE'
        );

        // creates index for column `exterior_id`
        $this->createIndex(
            '{{%idx-auto_exterior-exterior_id}}',
            '{{%auto_exterior}}',
            'exterior_id'
        );

        // add foreign key for table `{{%exterior}}`
        $this->addForeignKey(
            '{{%fk-auto_exterior-exterior_id}}',
            '{{%auto_exterior}}',
            'exterior_id',
            '{{%exterior}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%auto}}`
        $this->dropForeignKey(
            '{{%fk-auto_exterior-auto_id}}',
            '{{%auto_exterior}}'
        );

        // drops index for column `auto_id`
        $this->dropIndex(
            '{{%idx-auto_exterior-auto_id}}',
            '{{%auto_exterior}}'
        );

        // drops foreign key for table `{{%exterior}}`
        $this->dropForeignKey(
            '{{%fk-auto_exterior-exterior_id}}',
            '{{%auto_exterior}}'
        );

        // drops index for column `exterior_id`
        $this->dropIndex(
            '{{%idx-auto_exterior-exterior_id}}',
            '{{%auto_exterior}}'
        );

        $this->dropTable('{{%auto_exterior}}');
    }
}
