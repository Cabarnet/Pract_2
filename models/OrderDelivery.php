<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_delivery".
 *
 * @property int $id
 * @property int $variant
 * @property int $price
 *
 * @property Ordering[] $orderings
 */
class OrderDelivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_delivery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['variant', 'price'], 'required'],
            [['variant', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'variant' => 'Вариант доставки',
            'price' => 'Цена',
        ];
    }

    /**
     * Gets query for [[Orderings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::class, ['id_delivery' => 'id']);
    }
}
