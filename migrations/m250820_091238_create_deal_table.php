<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%deal}}`.
 */
class m250820_091238_create_deal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%deal}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'amount' => $this->decimal(10, 2)->notNull(),
        ]);
        $this->insert('{{%deal}}', [
            'title' => 'Хотят люстру',
            'amount' => 100000,
        ]);
        $this->insert('{{%deal}}', [
            'title' => 'Хотят светильник',
            'amount' => 15000,
        ]);
        $this->insert('{{%deal}}', [
            'title' => 'Пока думают',
            'amount' => 4000,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%deal}}');
    }
}
