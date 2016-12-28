<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roadreportimg`.
 */
class m161202_130031_create_roadreportimg_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('road_report_img', [
            'id' => $this->primaryKey(),
            'url' => $this->string(255)->notNull(), 
            'report_id' => $this->integer(),
        ]);

        // add foreign key for table `road`
        $this->addForeignKey(
            'fk-road_report_img-road_report_id',
            'road_report_img',
            'report_id',
            'road_report',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('road_report_img');
    }
}
