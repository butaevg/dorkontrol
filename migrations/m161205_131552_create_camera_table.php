<?php

use yii\db\Migration;

/**
 * Handles the creation of table `camera`.
 */
class m161205_131552_create_camera_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('camera', [
            'id' => $this->primaryKey(), 
            'name' => $this->string(512)->notNull(), 
            'folder' => $this->string(512), 
            'html' => $this->text(),
            'img' => $this->string(512), 
            'type' => $this->string(3)->notNull(), 
            'ip' => $this->string(50),
            'hide' => $this->boolean()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('camera');
    }
}
