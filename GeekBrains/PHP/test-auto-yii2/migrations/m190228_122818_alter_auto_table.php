<?php

use yii\db\Migration;

/**
 * Class m190228_122818_alter_auto_table
 */
class m190228_122818_alter_auto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%auto}}',
        'model_id', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%auto}}',
            'model_id');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190228_122818_alter_auto_table cannot be reverted.\n";

        return false;
    }
    */
}
