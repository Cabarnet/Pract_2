<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_photo".
 *
 * @property int $id
 * @property int $id_product
 * @property string $photo
 *
 * @property Product $product
 * @property Product[] $products
 */
class ProductPhoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'photo'], 'required'],
            [['id_product'], 'integer'],
            [['photo'], 'string', 'max' => 255],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Продукт',
            'photo' => 'Фото',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id_photo' => 'id']);
    }
}
