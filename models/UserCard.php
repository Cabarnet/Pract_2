<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_card".
 *
 * @property int $id
 * @property string $card_number
 * @property string $date
 * @property int $cvv
 *
 * @property Ordering[] $orderings
 * @property User[] $users
 */
class UserCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_number', 'date', 'cvv'], 'required'],
            [['date'], 'safe'],
            [['cvv'], 'integer'],
            [['card_number'], 'string', 'max' => 24],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_number' => 'Номер карты',
            'date' => 'Дата на карте',
            'cvv' => 'cvv',
        ];
    }

    /**
     * Gets query for [[Orderings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::class, ['id_user_card' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_card' => 'id']);
    }
}
