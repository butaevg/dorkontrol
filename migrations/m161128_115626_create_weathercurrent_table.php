<?php

use yii\db\Migration;

/**
 * Handles the creation of table `weathercurrent`.
 */
class m161128_115626_create_weathercurrent_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('weathercurrent', [
            'id' => $this->primaryKey(),
            'updated_at' => $this->integer()->notNull(),
            'sost' => $this->string(32), 
            'temp' => $this->string(10),
            'pr_r' => $this->string(32),
            'pr_m' => $this->string(32), 
            'works' => $this->text(),
            'rayon' => $this->integer()->notNull(),
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-weathercurrent-user_id',
            'weathercurrent',
            'rayon',
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
        $this->dropTable('weathercurrent');
    }
}
