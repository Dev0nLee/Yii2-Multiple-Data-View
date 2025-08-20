<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deal".
 *
 * @property int $id
 * @property string $title
 * @property float $amount
 *
 * @property ContactDeal[] $contactDeals
 */
class Deal extends \yii\db\ActiveRecord
{
	/**
	 * Идентификаторы выбранных контактов для формы
	 * @var int[]
	 */
	public $contact_id = [];


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'amount'], 'required'],
            [['amount'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['contact_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование',
            'amount' => 'Стоимость',
            'contact_id' => 'Контакты',
        ];
    }

    /**
     * Gets query for [[ContactDeals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactDeals()
    {
        return $this->hasMany(ContactDeal::class, ['deal_id' => 'id']);
    }

    /**
     * Deal`s contacts
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::class, ['id' => 'contact_id'])->via('contactDeals');
    }

}
