<?php

use yii\db\Migration;

/**
 * Handles the creation of table `appeal`.
 */
class m170515_093410_create_appeal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('appeal', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'email' => $this->string(100)->notNull(),
            'rayon' => $this->string(100)->notNull(),
            'selo' => $this->string(100)->notNull(),
            'street' => $this->string(128)->notNull(),
            'orient' => $this->string(512)->notNull(),
            'text' => $this->text(),
            'pic_1' => $this->string(512)->notNull(),
            'pic_2' => $this->string(512)->notNull(),
            'pic_3' => $this->string(512)->notNull(),
            'putdate' => $this->datetime()->notNull(),
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('appeal');
    }
}
