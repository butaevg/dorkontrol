<?php

use yii\db\Migration;

/**
 * Handles the creation of table `machine`.
 */
class m161214_074445_create_machine_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('machine', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'text' => $this->text(),
            'year_issue' => $this->string(5)->notNull(),
            'pic_1' => $this->string(512)->notNull(),
            'pic_2' => $this->string(512)->notNull(),
            'pic_3' => $this->string(512)->notNull(),
            'pic_4' => $this->string(512)->notNull(),
            'pic_5' => $this->string(512)->notNull(),
            'putdate' => $this->datetime()->notNull(),
            'dep_id' => $this->integer(),
            'working' => $this->boolean()->defaultValue(1),
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-machine-dep_id',
            'machine',
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
        $this->dropTable('machine');
    }
}
