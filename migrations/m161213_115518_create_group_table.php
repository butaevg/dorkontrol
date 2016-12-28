<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group`.
 */
class m161213_115518_create_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(), 
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('group');
    }
}
