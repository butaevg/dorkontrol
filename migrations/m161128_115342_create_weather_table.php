<?php

use yii\db\Migration;

/**
 * Handles the creation of table `weather`.
 */
class m161128_115342_create_weather_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('weather', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'sost' => $this->string(32), 
            'temp' => $this->string(10),
            'pr_r' => $this->string(32),
            'pr_m' => $this->string(32), 
            'works' => $this->text(),
            'rayon' => $this->integer()->notNull(),
        ]);

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-weather-user_id',
            'weather',
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
        $this->dropTable('weather');
    }
}
