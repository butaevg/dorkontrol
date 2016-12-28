<?php

use yii\db\Migration;

/**
 * Handles the creation of table `section`.
 */
class m161213_114330_create_section_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('section', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(), 
            'name_menu' => $this->string(150)->notNull(), 
            'url' => $this->string(150)->notNull(), 
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('section');
    }
}
