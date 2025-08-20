<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_deal".
 *
 * @property int $id
 * @property int $contact_id
 * @property int $deal_id
 *
 * @property Contact $contact
 * @property Deal $deal
 */
class ContactDeal extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_deal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contact_id', 'deal_id'], 'required'],
            [['contact_id', 'deal_id'], 'integer'],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::class, 'targetAttribute' => ['contact_id' => 'id']],
            [['deal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Deal::class, 'targetAttribute' => ['deal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact_id' => 'Contact ID',
            'deal_id' => 'Deal ID',
        ];
    }

    /**
     * Gets query for [[Contact]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::class, ['id' => 'contact_id']);
    }

    /**
     * Gets query for [[Deal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeal()
    {
        return $this->hasOne(Deal::class, ['id' => 'deal_id']);
    }

}
