<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordering".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_cart
 * @property int $id_address
 * @property int $id_user_card
 * @property int $id_delivery
 * @property int $id_status
 * @property string $date
 *
 * @property UserAddress $address
 * @property Cart $cart
 * @property OrderDelivery $delivery
 * @property OrderStatus $status
 * @property User $user
 * @property UserCard $userCard
 */
class Ordering extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordering';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_cart', 'id_address', 'id_user_card', 'id_delivery', 'id_status', 'date'], 'required'],
            [['id_user', 'id_cart', 'id_address', 'id_user_card', 'id_delivery', 'id_status'], 'integer'],
            [['date'], 'safe'],
            [['id_address'], 'exist', 'skipOnError' => true, 'targetClass' => UserAddress::class, 'targetAttribute' => ['id_address' => 'id']],
            [['id_cart'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['id_cart' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::class, 'targetAttribute' => ['id_status' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_user_card'], 'exist', 'skipOnError' => true, 'targetClass' => UserCard::class, 'targetAttribute' => ['id_user_card' => 'id']],
            [['id_delivery'], 'exist', 'skipOnError' => true, 'targetClass' => OrderDelivery::class, 'targetAttribute' => ['id_delivery' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Польователь',
            'id_cart' => 'Корзина',
            'id_address' => 'Адрес',
            'id_user_card' => 'Карта',
            'id_delivery' => 'Доставка',
            'id_status' => 'Статус',
            'date' => 'Дата',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(UserAddress::class, ['id' => 'id_address']);
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'id_cart']);
    }

    /**
     * Gets query for [[Delivery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDelivery()
    {
        return $this->hasOne(OrderDelivery::class, ['id' => 'id_delivery']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrderStatus::class, ['id' => 'id_status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    /**
     * Gets query for [[UserCard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCard()
    {
        return $this->hasOne(UserCard::class, ['id' => 'id_user_card']);
    }
}
