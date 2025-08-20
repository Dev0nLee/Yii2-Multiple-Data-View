<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m250820_091132_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
        ]);
        $this->insert('{{%contact}}', [
            'name' => 'Василий',
            'surname' => 'Иванов',
        ]);
        $this->insert('{{%contact}}', [
            'name' => 'Иван',
            'surname' => 'Петров',
        ]);
        $this->insert('{{%contact}}', [
            'name' => 'Наталья',
            'surname' => 'Сидорова',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}
