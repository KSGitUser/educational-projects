<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%auto_safety}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%auto}}`
 * - `{{%safety}}`
 */
class m190227_142231_create_junction_table_for_auto_and_safety_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%auto_safety}}', [
            'auto_id' => $this->integer(),
            'safety_id' => $this->integer(),
            'PRIMARY KEY(auto_id, safety_id)',
        ]);

        // creates index for column `auto_id`
        $this->createIndex(
            '{{%idx-auto_safety-auto_id}}',
            '{{%auto_safety}}',
            'auto_id'
        );

        // add foreign key for table `{{%auto}}`
        $this->addForeignKey(
            '{{%fk-auto_safety-auto_id}}',
            '{{%auto_safety}}',
            'auto_id',
            '{{%auto}}',
            'id',
            'CASCADE'
        );

        // creates index for column `safety_id`
        $this->createIndex(
            '{{%idx-auto_safety-safety_id}}',
            '{{%auto_safety}}',
            'safety_id'
        );

        // add foreign key for table `{{%safety}}`
        $this->addForeignKey(
            '{{%fk-auto_safety-safety_id}}',
            '{{%auto_safety}}',
            'safety_id',
            '{{%safety}}',
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
            '{{%fk-auto_safety-auto_id}}',
            '{{%auto_safety}}'
        );

        // drops index for column `auto_id`
        $this->dropIndex(
            '{{%idx-auto_safety-auto_id}}',
            '{{%auto_safety}}'
        );

        // drops foreign key for table `{{%safety}}`
        $this->dropForeignKey(
            '{{%fk-auto_safety-safety_id}}',
            '{{%auto_safety}}'
        );

        // drops index for column `safety_id`
        $this->dropIndex(
            '{{%idx-auto_safety-safety_id}}',
            '{{%auto_safety}}'
        );

        $this->dropTable('{{%auto_safety}}');
    }
}
