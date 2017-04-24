<?php

use yii\db\Migration;

/**
 * Handles the creation of table `docs_category`.
 */
class m170424_082313_create_docs_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('docs_category', [
            'id' => $this->primaryKey(), 
            'name' => $this->string(200)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('docs_category');
    }
}
