<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m161213_090517_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512)->notNull(), 
            'slug' => $this->string(512)->notNull(),
            'text' => $this->text(), 
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('page');
    }
}
