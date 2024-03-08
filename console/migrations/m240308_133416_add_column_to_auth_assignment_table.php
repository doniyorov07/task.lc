<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%auth_assignment}}`.
 */
class m240308_133416_add_column_to_auth_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%auth_assignment}}', 'type', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%auth_assignment}}', 'position');
    }
}
