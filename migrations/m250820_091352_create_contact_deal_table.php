<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_deal}}`.
 */
class m250820_091352_create_contact_deal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_deal}}', [
            'id' => $this->primaryKey(),
            'contact_id' => $this->integer()->notNull(),
            'deal_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx-contact_deal-contact_id',
            'contact_deal',
            'contact_id'
        );
        $this->addForeignKey(
            'fk-contact_deal-contact_id',
            'contact_deal',
            'contact_id',
            'contact',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-contact_deal-deal_id',
            'contact_deal',
            'deal_id'
        );
        $this->addForeignKey(
            'fk-contact_deal-deal_id',
            'contact_deal',
            'deal_id',
            'deal',
            'id',
            'CASCADE'
        );
        $this->insert('{{%contact_deal}}', [
            'contact_id' => 1,
            'deal_id' => 1,
        ]);
        $this->insert('{{%contact_deal}}', [
            'contact_id' => 3,
            'deal_id' => 1,
        ]);
        $this->insert('{{%contact_deal}}', [
            'contact_id' => 1,
            'deal_id' => 2,
        ]);
        $this->insert('{{%contact_deal}}', [
            'contact_id' => 2,
            'deal_id' => 2,
        ]);
        $this->insert('{{%contact_deal}}', [
            'contact_id' => 2,
            'deal_id' => 3,
        ]);
        $this->insert('{{%contact_deal}}', [
            'contact_id' => 3,
            'deal_id' => 3,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_deal}}');
    }
}
