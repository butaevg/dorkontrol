<?php

use yii\db\Migration;

/**
 * Handles the creation of table `map`.
 */
class m161205_142229_create_map_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('map', [
            'id' => $this->primaryKey(), 
            'rayon' => $this->string(20)->notNull(), 
            'plos' => $this->string(20)->notNull(),
            'nal_dor_obs' => $this->string(20)->notNull(),
            'selo' => $this->string(20)->notNull(),
            'selo_bezd' => $this->string(20)->notNull(),
            'prot_obs' => $this->string(20)->notNull(),
            'res_dor' => $this->string(20)->notNull(),
            'mest_dor' => $this->string(20)->notNull(),
            'res_dor_asf' => $this->string(20)->notNull(),
            'mest_dor_asf' => $this->string(20)->notNull(),
            'map_rayon' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('map');
    }
}
