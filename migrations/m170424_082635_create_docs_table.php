<?php

use yii\db\Migration;

/**
 * Handles the creation of table `docs`.
 */
class m170424_082635_create_docs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('docs', [
            'id' => $this->primaryKey(), 
            'name' => $this->string(512)->notNull(),
            'url' => $this->string(512)->notNull(),
            'extension' => $this->string(10)->notNull(),
            'size' => $this->string(10)->notNull(),
            'category_id' => $this->integer(),
        ]);


        // add foreign key for table `docs_category`
        $this->addForeignKey(
            'fk-docs-category_id',
            'docs',
            'category_id',
            'docs_category',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('docs');
    }
}
