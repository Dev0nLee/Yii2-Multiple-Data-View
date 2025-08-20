<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 *
 * @property ContactDeal[] $contactDeals
 */
class Contact extends \yii\db\ActiveRecord
{
	/**
	 * Идентификаторы выбранных сделок для формы
	 * @var int[]
	 */
	public $deal_id = [];


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['deal_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'deal_id' => 'Сделки',
        ];
    }

    /**
     * Gets query for [[ContactDeals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactDeals()
    {
        return $this->hasMany(ContactDeal::class, ['contact_id' => 'id']);
    }

    /**
     * Contact`s deals
     * @return \yii\db\ActiveQuery
     */
    public function getDeals()
    {
        return $this->hasMany(Deal::class, ['id' => 'deal_id'])->via('contactDeals');
    }

}
