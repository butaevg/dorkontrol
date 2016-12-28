<?php

use yii\db\Migration;

/**
 * Handles the creation of table `road`.
 */
class m161201_125704_create_road_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('road', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(), 
            'text' => $this->text(),
            'type' => $this->string(3)->notNull(),             
            'onsite' => $this->boolean()->defaultValue(0),
            'report' => $this->boolean()->defaultValue(0),             
            'complete' => $this->boolean()->defaultValue(0),
            'contractor_id' => $this->integer(),
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-road-user_id',
            'road',
            'contractor_id',
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
        $this->dropTable('road');
    }
}
