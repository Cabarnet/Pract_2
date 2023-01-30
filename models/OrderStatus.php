<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property Ordering[] $orderings
 */
class OrderStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Orderings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderings()
    {
        return $this->hasMany(Ordering::class, ['id_status' => 'id']);
    }
}
