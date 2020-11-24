<?php

use yii\db\Migration;

/**
 * Class m201124_102930_adding_date_of_birth
 */
class m201124_102930_adding_date_of_birth extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('{{%user}}', 'date_of_birth', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropColumn('{{%user}}', 'date_of_birth');
    }
}
