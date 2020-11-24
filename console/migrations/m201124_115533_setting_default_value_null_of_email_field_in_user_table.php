<?php

use yii\db\Migration;

/**
 * Class m201124_115533_setting_default_value_null_of_email_field_in_user_table
 */
class m201124_115533_setting_default_value_null_of_email_field_in_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('{{%user}}', 'email',  $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->alterColumn('{{%user}}', 'email', $this->string());
    }
}
