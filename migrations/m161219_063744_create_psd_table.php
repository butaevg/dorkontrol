<?php

use yii\db\Migration;

/**
 * Handles the creation of table `psd`.
 */
class m161219_063744_create_psd_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('psd', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(),
            'price' => $this->float()->notNull(),
            'contractor' => $this->integer(), 
            'exe' => $this->float()->defaultValue(0),
            'exe_perc' => $this->integer()->defaultValue(0),
            'getsum' => $this->float()->defaultValue(0), 
            'exe_getsum' => $this->integer()->defaultValue(0),
            'updated_at' => $this->datetime()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('psd');
    }
}
