<?php

use yii\db\Migration;

/**
 * Handles the creation of table `org`.
 */
class m161215_074926_create_org_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('org', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'dep_id' => $this->integer(),
            'cat' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-org-dep_id',
            'org',
            'dep_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('org');
    }
}
