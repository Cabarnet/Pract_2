<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $id_category
 * @property int $id_photo
 * @property int $is_discount
 * @property int $discount
 * @property int $flag
 * @property string $description
 * @property string $characteristic
 * @property string $way_of_use
 * @property string $link
 * @property float $rating
 * @property string $date_of_creation
 * @property string $date_of_update
 * @property int $author
 * @property int $price
 * @property int $id_company
 *
 * @property CartProduct[] $cartProducts
 * @property Category $category
 * @property Company $company
 * @property FavoriteProduct[] $favoriteProducts
 * @property ProductPhoto $photo
 * @property ProductPhoto[] $productPhotos
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'discount', 'description', 'characteristic', 'way_of_use', 'link', 'rating', 'date_of_creation', 'date_of_update', 'author', 'price'], 'required'],
            [['id_category', 'id_photo', 'is_discount', 'discount', 'flag', 'author', 'price', 'id_company'], 'integer'],
            [['description'], 'string'],
            [['rating'], 'number'],
            [['date_of_creation', 'date_of_update'], 'safe'],
            [['name', 'characteristic', 'way_of_use', 'link'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
            [['id_photo'], 'exist', 'skipOnError' => true, 'targetClass' => ProductPhoto::class, 'targetAttribute' => ['id_photo' => 'id']],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'id_category' => 'Категории',
            'id_photo' => 'Фото',
            'is_discount' => 'Есть ли скидка',
            'discount' => 'Скидка',
            'flag' => 'Flag',
            'description' => 'Описание',
            'characteristic' => 'Характеристики',
            'way_of_use' => 'Способ применения',
            'link' => 'Ссылка на компанию',
            'rating' => 'Рейтинг',
            'date_of_creation' => 'Дата создания',
            'date_of_update' => 'Дата последнего изменения',
            'author' => 'Автор записи',
            'price' => 'Цена',
            'id_company' => 'Компания',
        ];
    }

    /**
     * Gets query for [[CartProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCartProducts()
    {
        return $this->hasMany(CartProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[FavoriteProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoriteProducts()
    {
        return $this->hasMany(FavoriteProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Photo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoto()
    {
        return $this->hasOne(ProductPhoto::class, ['id' => 'id_photo']);
    }

    /**
     * Gets query for [[ProductPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductPhotos()
    {
        return $this->hasMany(ProductPhoto::class, ['id_product' => 'id']);
    }
}
