<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roadreport`.
 */
class m161202_121041_create_roadreport_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('road_report', [
            'id' => $this->primaryKey(),
            'name' => $this->string(512)->notNull(), 
            'road_id' => $this->integer(),
        ]);

        // add foreign key for table `road`
        $this->addForeignKey(
            'fk-road_report-road_id',
            'road_report',
            'road_id',
            'road',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('roadreport');
    }
}
