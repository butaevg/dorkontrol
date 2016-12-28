<?php

use yii\db\Migration;

class m161213_121704_add_column_group_table extends Migration
{
    public function up()
    {
        $this->addColumn('group', 'categories', 'string AFTER `name` ');

    }

    public function down()
    {
        echo "m161213_121704_add_column_group_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
