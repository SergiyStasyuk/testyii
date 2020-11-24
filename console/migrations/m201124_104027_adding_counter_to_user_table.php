<?php

use yii\db\Migration;

/**
 * Class m201124_104027_adding_counter_to_user_table
 */
class m201124_104027_adding_counter_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('{{%user}}', 'counter', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropColumn('{{%user}}', 'counter');
    }
}
