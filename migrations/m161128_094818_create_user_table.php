<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m161128_094818_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(), 
            'username' => $this->string()->notNull(), 
            'name' => $this->string()->notNull(),
            'fullname' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'auth_key' => $this->string(32),
            'password_hash' => $this->string()->notNull(), 
            'insta' => $this->string()->notNull(),
            'cat' => $this->smallInteger()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
