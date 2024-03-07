<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%emplyee}}`.
 */
class m240307_131214_create_emplyee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%emplyee}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'image' => $this->string(),
            'birthday' => $this->date(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%emplyee}}');
    }
}
